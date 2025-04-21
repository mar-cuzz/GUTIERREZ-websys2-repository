<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get("/login", function () {
    return view('auth.login');
})->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('/logout', function () {
    return view('auth.login');
})->name('logout');
//Home
Route::get('/home', [HomeController::class, 'index'])->name('welcome');

//Jobs
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');


//Candidates
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
Route::get('/candidates/{id}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
Route::put('/candidates/{id}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('/candidates/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');