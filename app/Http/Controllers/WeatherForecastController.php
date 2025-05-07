<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;


class WeatherForecastController extends Controller
{

  private $weather_service;

  public function __construct()
  {
    $this->weather_service = new WeatherService();
  }



  public function index()
  {
    $payload = $this->weather_service->getWeatherData();

    return view('welcome', [
      'current_date' => $payload['current_date'],
      'weather_data' => $payload['weather_data'],
      'weather_icons' => $payload['weather_icons'],
      'weather_trend' => $payload['weather_trend'],
    ]);
  }
}
