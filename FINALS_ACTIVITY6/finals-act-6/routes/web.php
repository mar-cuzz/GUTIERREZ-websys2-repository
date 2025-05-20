<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\NewsController;

Route::get('/news', [NewsController::class, 'showNews']);

Route::get('/weather', [WeatherController::class, 'showWeatherPage']);

Route::get('/', function () {
    return view('welcome');
});
