<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Create
Route::get('insert', [StudentController::class, 'insertform']);
Route::post('create', [StudentController::class, 'insert']);
//Read
Route::get('read', [StudentController::class, 'read']);
//Update
Route::get('edit/{id}', [StudentController::class, 'updateStudent']);
Route::post('update/{id}', [StudentController::class, 'update']);
//Delete
Route::get('delete/{id}', [StudentController::class, 'delete']);

