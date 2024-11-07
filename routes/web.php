<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RedirectIfAdmin;
use App\Livewire\AffiliateLandingPage;
use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\AdminUserList;
use App\Livewire\Admin\AdminEditUser;

Route::get('/', AffiliateLandingPage::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', RedirectIfAdmin::class])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/users', AdminUserList::class)->name('admin.users.index');
    Route::get('/users/{userId}/edit', AdminEditUser::class)->name('admin.users.edit');
});

require __DIR__.'/auth.php';
