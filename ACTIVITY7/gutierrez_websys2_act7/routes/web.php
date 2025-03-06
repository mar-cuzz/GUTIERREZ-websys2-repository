<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('InfoForm', function () {
    return view('form');
});
Route::post('InfoForm', [FormController::class, 'handleForm'])->name('InfoForm');
