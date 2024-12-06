<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RedirectIfAdmin;
use App\Livewire\Admin\AdminEditUser;
use App\Livewire\Admin\Promo\AdminPromoCreate;
use App\Livewire\Admin\Promo\AdminPromoEdit;
use App\Livewire\Admin\Promo\AdminPromoList;
use App\Livewire\Admin\AdminUserList;
use App\Livewire\Admin\Event\AdminEventCreate;
use App\Livewire\Admin\Event\AdminEventEdit;
use App\Livewire\Admin\Event\AdminEventList;
use App\Livewire\AffiliateLandingPage;
use App\Livewire\EventList;
use App\Livewire\EventShow;
use App\Livewire\PromoList;
use App\Livewire\PromoShow;
use Illuminate\Support\Facades\Route;

Route::get('/', AffiliateLandingPage::class)->name('landing-page');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', RedirectIfAdmin::class])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/events', EventList::class)->name('events.index');
Route::get('/events/{id}', EventShow::class)->name('events.show');
Route::get('/promos', PromoList::class)->name('promos.index');
Route::get('/promos/{id}', PromoShow::class)->name('promos.show');

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/users', AdminUserList::class)->name('admin.users.index');
    Route::get('/users/{userId}/edit', AdminEditUser::class)->name('admin.users.edit');

    Route::get('/events', AdminEventList::class)->name('admin.events.index');
    Route::get('/events/create', AdminEventCreate::class)->name('admin.events.create');
    Route::get('/events/{eventId}/edit', AdminEventEdit::class)->name('admin.events.edit');

    Route::get('/promos', AdminPromoList::class)->name('admin.promos.index');
    Route::get('/promos/create', AdminPromoCreate::class)->name('admin.promos.create');
    Route::get('/promos/{promoId}/edit', AdminPromoEdit::class)->name('admin.promos.edit');
});

require __DIR__.'/auth.php';
