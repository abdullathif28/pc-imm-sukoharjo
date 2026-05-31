<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\KontenController as AdminKonten;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\SuperAdmin\KontenController as SuperAdminKonten;
use App\Http\Controllers\SuperAdmin\BidangController as SuperAdminBidang;
use App\Http\Controllers\SuperAdmin\AdminController as SuperAdminAdmin;
use App\Http\Controllers\SuperAdmin\PengurusController;
use App\Http\Controllers\SuperAdmin\KomisariatController;
use App\Http\Controllers\SuperAdmin\TimelineController;
use App\Http\Controllers\SuperAdmin\SettingController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
Route::get('/komisariat', [PublicController::class, 'komisariat'])->name('komisariat');
Route::get('/konten', [PublicController::class, 'konten'])->name('konten');
Route::get('/konten/{slug}', [PublicController::class, 'detailKonten'])->name('konten.detail');
Route::get('/bidang', [PublicController::class, 'bidang'])->name('bidang');
Route::get('/bidang/{bidang}', [PublicController::class, 'detailBidang'])->name('bidang.detail');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.post');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN BIDANG ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin_bidang'])
    ->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::resource('konten', AdminKonten::class)->middleware('bidang.access');
    });

/*
|--------------------------------------------------------------------------
| SUPER ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('super-admin')
    ->name('super-admin.')
    ->middleware(['auth', 'role:super_admin'])
    ->group(function () {

        Route::get('/dashboard', [SuperAdminDashboard::class, 'index'])->name('dashboard');

        // Konten, Bidang, Admin (lama)
        Route::resource('konten',  SuperAdminKonten::class);
        Route::resource('bidang',  SuperAdminBidang::class);
        Route::resource('admin',   SuperAdminAdmin::class);

        // BARU: Pengurus, Komisariat, Timeline
        Route::resource('pengurus',   PengurusController::class);
        Route::resource('komisariat', KomisariatController::class);
        Route::resource('timeline',   TimelineController::class);

        // BARU: Settings (hanya index + update)
        Route::get('/settings',  [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings',  [SettingController::class, 'update'])->name('settings.update');
    });
