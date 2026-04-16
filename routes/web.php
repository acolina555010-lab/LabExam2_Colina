<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (Rice Menu Management)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [RiceController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [RiceController::class, 'store'])->name('menu.store');
    Route::get('/dashboard/{id}/edit', [RiceController::class, 'edit'])->name('menu.edit');
    Route::put('/dashboard/{id}', [RiceController::class, 'update'])->name('menu.update');
    Route::delete('/dashboard/{id}', [RiceController::class, 'destroy'])->name('menu.destroy');
});

// Orders
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/order', [OrderController::class, 'orderindex'])->name('order');
    Route::post('/order', [OrderController::class, 'orderstore'])->name('order.store');
    Route::get('/order/{id}/edit', [OrderController::class, 'orderedit'])->name('order.edit');
    Route::put('/order/{id}', [OrderController::class, 'orderupdate'])->name('order.update');
    Route::delete('/order/{id}', [OrderController::class, 'orderdestroy'])->name('order.destroy');
});

// Payments
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/payment', [PaymentController::class, 'paymentindex'])->name('payment');
});

// Profile (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';