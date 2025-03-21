<?php

use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

// Guest Routes (Login & Registration)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register']);
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('donations')->group(function () {
        Route::get('/', [DonationController::class, 'index'])->name('donations.index');
        Route::get('/add', [DonationController::class, 'create'])->name('donations.create');
        Route::post('/store', [DonationController::class, 'store'])->name('donations.store');

        // Only Admin & Manager can edit or delete donations
        Route::middleware(['role:Admin|Manager'])->group(function () {
            Route::get('/{donation}/edit', [DonationController::class, 'edit'])->name('donations.edit');
            Route::put('/{donation}', [DonationController::class, 'update'])->name('donations.update');
            Route::delete('/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
        });
    });


    // Profile Route
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});
