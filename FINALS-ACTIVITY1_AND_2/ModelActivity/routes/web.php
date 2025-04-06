<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;

Route::get('/home', [BookController::class, "index"])->name('home');
Route::get("/register", [RegisterController::class, "showRegisterForm"])->name("registerform");
Route::post("/register", [RegisterController::class, "registerUser"])->name("register");
Route::get("/login", [LoginController::class, "loginForm"]);

Route::get("/login", [LoginController::class, "showLoginForm"])->name("loginForm");
Route::post("/login", [LoginController::class, "login"]);
Route::get("/logout", [LoginController::class, "logout"]);

Route::resource('books', BookController::class);
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');