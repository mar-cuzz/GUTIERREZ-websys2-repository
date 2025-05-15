<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
});

Route::get('/loginForm', [AuthController::class, 'showLogin'])->name('loginForm');
Route::post('/loginForm', [AuthController::class, 'login'])->name('logins');

Route::get('/dash', [AuthController::class, 'dash'])->middleware('auth.custom')->name('dash');
Route::post('/dash', [AuthController::class, 'logout'])->name('lgout');

Route::post('/adduser', [AuthController::class, 'addTestuser'])->name('addtest');



require __DIR__.'/auth.php';
