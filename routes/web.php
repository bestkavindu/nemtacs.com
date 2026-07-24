<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::livewire('projects', 'pages::projects.index')->name('projects.index');
Route::livewire('projects/{project:slug}', 'pages::projects.show')->name('projects.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::livewire('users/create', 'pages::admin.users.create')->name('users.create');

    Route::livewire('projects', 'pages::admin.projects.index')->name('projects.index');
    Route::livewire('projects/create', 'pages::admin.projects.create')->name('projects.create');
    Route::livewire('projects/{project}/edit', 'pages::admin.projects.edit')->name('projects.edit');
});

require __DIR__.'/settings.php';
