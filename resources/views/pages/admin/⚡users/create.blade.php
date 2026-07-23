<?php

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\User;
use Flux\Flux;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Create user')] class extends Component {
    use PasswordValidationRules, ProfileValidationRules;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $is_admin = false;

    /**
     * Validate input and create a new user.
     */
    public function createUser(): void
    {
        $validated = $this->validate([
            ...$this->profileRules(),
            'password' => $this->passwordRules(),
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        if ($this->is_admin) {
            $user->assignRole('admin');
        }

        $this->reset('name', 'email', 'password', 'password_confirmation', 'is_admin');

        Flux::toast(variant: 'success', text: __('User created.'));
    }
}; ?>

<section class="w-full max-w-lg">
    <flux:heading size="xl">{{ __('Create user') }}</flux:heading>
    <flux:subheading class="mb-6">{{ __('Add a new user to the application') }}</flux:subheading>

    <form wire:submit="createUser" class="space-y-6">
        <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="off" />

        <flux:input wire:model="email" :label="__('Email address')" type="email" required autocomplete="off" />

        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            viewable
        />

        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            viewable
        />

        <flux:checkbox wire:model="is_admin" :label="__('Administrator')" />

        <flux:button variant="primary" type="submit" data-test="create-user-button">
            {{ __('Create user') }}
        </flux:button>
    </form>
</section>
