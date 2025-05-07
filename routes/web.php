<?php

use App\Http\Controllers\WeatherForecastController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WeatherForecastController::class, 'index']);
