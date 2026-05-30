<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\SuperAdmin\BidangController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\KontenController as SuperAdminKonten;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\KontenController as AdminKonten;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/konten', [PublicController::class, 'konten'])->name('konten');
Route::get('/konten/{slug}', [PublicController::class, 'detailKonten'])->name('konten.detail');
Route::get('/bidang', [PublicController::class, 'bidang'])->name('bidang');
Route::get('/bidang/{bidang}', [PublicController::class, 'detailBidang'])->name('bidang.detail');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('super-admin')->name('super-admin.')->middleware(['auth', 'role:super_admin'])->group(function () {

    Route::get('/dashboard', [SuperAdminDashboard::class, 'index'])->name('dashboard');

    // Bidang Management
    Route::resource('bidang', BidangController::class);

    // Admin Management
    Route::resource('admin', AdminController::class);

    // Konten Management
    Route::resource('konten', SuperAdminKonten::class);
});

/*
|--------------------------------------------------------------------------
| Admin Bidang Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin_bidang'])->group(function () {

    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Konten Management (only own bidang)
    Route::resource('konten', AdminKonten::class);
});
