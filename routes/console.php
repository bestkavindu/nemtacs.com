<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('user:make-admin {email}', function (string $email) {
    $user = User::where('email', $email)->first();

    if (! $user) {
        $this->error("No user with email [{$email}].");

        return 1;
    }

    Role::findOrCreate('admin');
    $user->assignRole('admin');

    $this->info("{$user->email} is now an admin.");

    return 0;
})->purpose('Grant the admin role to a user by email');
