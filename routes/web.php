<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/rooms', [BookingController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{room}', [BookingController::class, 'show'])->name('rooms.show');
    Route::get('/seats/{seat}', [BookingController::class, 'seat'])->name('seats.show');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'showBooking'])->name('bookings.show');
});

require __DIR__.'/auth.php';
