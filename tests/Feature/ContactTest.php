<?php

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    RateLimiter::clear('enquiry:127.0.0.1');
});

test('contact page is reachable', function () {
    $this->get(route('contact'))->assertOk()->assertSee('Request a quote');
});

test('an enquiry is stored and mailed', function () {
    Mail::fake();

    Livewire::test('pages::contact')
        ->set('name', 'Nimal Perera')
        ->set('company', 'Acme Engineering')
        ->set('email', 'nimal@acme.lk')
        ->set('phone', '+94 777 000 111')
        ->set('subject', '2500A main distribution board')
        ->set('message', 'We need a type-tested MDB for a plant in Gampaha by October.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('sent', true)
        ->assertSet('name', '');

    $enquiry = Enquiry::sole();

    expect($enquiry->email)->toBe('nimal@acme.lk')
        ->and($enquiry->company)->toBe('Acme Engineering')
        ->and($enquiry->ip_address)->not->toBeNull();

    Mail::assertSent(EnquiryReceived::class, fn ($mail) => $mail->hasTo(config('mail.enquiries_to')));
});

test('name, email and message are required', function () {
    Livewire::test('pages::contact')
        ->call('submit')
        ->assertHasErrors(['name' => 'required', 'email' => 'required', 'message' => 'required']);

    expect(Enquiry::count())->toBe(0);
});

test('a too-short message is rejected', function () {
    Livewire::test('pages::contact')
        ->set('name', 'Nimal')
        ->set('email', 'nimal@acme.lk')
        ->set('message', 'hi')
        ->call('submit')
        ->assertHasErrors(['message' => 'min']);
});

test('the honeypot field blocks bots', function () {
    Livewire::test('pages::contact')
        ->set('name', 'Bot')
        ->set('email', 'bot@spam.test')
        ->set('message', 'Buy cheap backlinks from our agency today.')
        ->set('website', 'http://spam.test')
        ->call('submit')
        ->assertHasErrors('website');

    expect(Enquiry::count())->toBe(0);
});

test('a delivery failure still keeps the enquiry', function () {
    Mail::shouldReceive('to')->andThrow(new RuntimeException('SMTP down'));

    Livewire::test('pages::contact')
        ->set('name', 'Nimal')
        ->set('email', 'nimal@acme.lk')
        ->set('message', 'We need a type-tested MDB for a plant in Gampaha.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('sent', true);

    expect(Enquiry::count())->toBe(1);
});

test('enquiries are rate limited per ip', function () {
    Mail::fake();

    foreach (range(1, 5) as $i) {
        Livewire::test('pages::contact')
            ->set('name', "Sender {$i}")
            ->set('email', "sender{$i}@acme.lk")
            ->set('message', 'We need a quotation for a distribution board.')
            ->call('submit')
            ->assertHasNoErrors();
    }

    Livewire::test('pages::contact')
        ->set('name', 'Sender 6')
        ->set('email', 'sender6@acme.lk')
        ->set('message', 'We need a quotation for a distribution board.')
        ->call('submit')
        ->assertHasErrors('message');

    expect(Enquiry::count())->toBe(5);
});
