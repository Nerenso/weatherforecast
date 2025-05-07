<?php

namespace App\Services;

use App\Models\WeatherForecastData;
use Illuminate\Support\Facades\Http;

class WeatherService
{

  private $current_date;

  public function __construct()
  {
    $this->current_date = date_format(date_create(now()->toDateString()), 'd-m-Y');
  }

  public function getWeatherData()
  {
    $past_days_weather_data = $this->getPastDaysWeatherData();
    $forecast_weather_data = $this->getForecastWeatherData();

    $weather_data = array_merge($past_days_weather_data, $forecast_weather_data);

    $weather_trend = $this->calculateWeatherTrend($weather_data);

    $weather_icons = json_decode(file_get_contents(base_path('utils/weathercode-icons.json')), false);

    return view('welcome', [
      'current_date' => $this->current_date,
      'weather_data' => $weather_data,
      'weather_icons' => $weather_icons,
      'weather_trend' => (object)$weather_trend,
    ]);
  }

  /**
   * Fetches the weather data for the past 2 days, either from cache or live from open-meteo.
   *
   * @return array The weather data for the past 2 days
   */
  private function getPastDaysWeatherData()
  {
    $saved_data = $this->checkForSavedData();
    if ($saved_data) {
      $past_days_weather_api_response = json_decode($saved_data->open_mateo_api_response, false);
    } else {
      $past_days_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=52.1583&longitude=4.5292&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&past_days=2&forecast_days=0")->object();

      // $past_days_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=52.1583&longitude=4.5292&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&past_days=2&forecast_days=0")->object();

      // $past_days_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=25.7743&longitude=-80.1937&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&past_days=2&forecast_days=0")->object();

      // $past_days_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=-33.9258&longitude=18.4232&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&past_days=2&forecast_days=0")->object();

      // $past_days_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=39.9075&longitude=116.3972&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&past_days=2&forecast_days=0")->object();

      // $past_days_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=-41.2866&longitude=174.7756&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&&past_days=2&forecast_days=0")->object();

      $this->saveWeatherData($past_days_weather_api_response);
    }

    return $this->createWeatherDataArray($past_days_weather_api_response);
  }

  /**
   * Fetches the weather forecast data for the next 3 days from open-meteo and returns it as an array.
   *
   * @return array The weather forecast data for the next 3 days
   */
  private function getForecastWeatherData()
  {
    $forecast_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=52.1583&longitude=4.5292&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&forecast_days=3")->object();

    // $forecast_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=52.1583&longitude=4.5292&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&forecast_days=3")->object();

    //   $forecast_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=25.7743&longitude=-80.1937&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&forecast_days=3")->object();

    // $forecast_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=-33.9258&longitude=18.4232&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&forecast_days=3")->object();

    // $forecast_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=39.9075&longitude=116.3972&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&forecast_days=3")->object();

    // $forecast_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=-41.2866&longitude=174.7756&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&&forecast_days=3")->object();

    // $forecast_weather_api_response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=55.7522&longitude=37.6156&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,rain_sum&models=knmi_seamless&current=temperature_2m,apparent_temperature&timezone=Europe%2FBerlin&forecast_days=3")->object();

    return $this->createWeatherDataArray($forecast_weather_api_response);
  }

  /**
   * Takes an open-meteo API response and converts it into an array of associative arrays.
   * Each associative array contains the weather data for a single day.
   *
   * @param object $weather_api_response The open-meteo API response
   * @return array The weather data for each day
   */
  private function createWeatherDataArray($weather_api_response)
  {
    $weather_data_array = array_map(function (
      $day,
      $weather_code,
      $temperature_max,
      $temperature_min,
      $rain,
      $wind_speed
    ) {
      return [
        'day' => (object)[
          'week_day' => date_format(date_create($day), 'D'),
          'date' => date_format(date_create($day), 'd-m-Y'),
        ],
        'weather_code' => $weather_code,
        'temperature_max' => round($temperature_max),
        'temperature_min' => round($temperature_min),
        'rain' => $rain,
        'wind_speed' => $wind_speed,
      ];
    }, $weather_api_response->daily->time, $weather_api_response->daily->weather_code, $weather_api_response->daily->temperature_2m_max, $weather_api_response->daily->temperature_2m_min, $weather_api_response->daily->rain_sum, $weather_api_response->daily->wind_speed_10m_max);

    return $weather_data_array;
  }

  /**
   * Checks if there is a saved WeatherForecastData object in the database for the current date.
   * If such an object exists, it is returned. Otherwise, null is returned.
   *
   * @return WeatherForecastData|null The saved WeatherForecastData object, or null if none exists
   */
  private function checkForSavedData()
  {
    $saved_data = WeatherForecastData::where('requested_at', $this->current_date)->first();

    return $saved_data ?? null;
  }

  /**
   * Saves the received Open Meteo API response to the database.
   *
   * @param object $weather_api_response The response received from the Open Meteo API
   * @return void
   */
  private function saveWeatherData($weather_api_response)
  {
    $weather_forecast_data = WeatherForecastData::create([
      'requested_at' => $this->current_date,
      'latitude' => $weather_api_response->latitude,
      'longitude' => $weather_api_response->longitude,
      'open_mateo_api_response' => json_encode($weather_api_response),
    ]);

    $weather_forecast_data->save();
  }

  private function calculateWeatherTrend($weather_data)
  {
    $prev_max_temp = null;
    $rising = 0;
    $falling = 0;
    $stable = 0;
    $trend = null;

    foreach ($weather_data as $day) {
      if ($prev_max_temp === null) {
        $prev_max_temp = $day['temperature_max'];
        continue;
      }

      if ($day['temperature_max'] > $prev_max_temp) {
        $rising++;
      } elseif ($day['temperature_max'] < $prev_max_temp) {
        $falling++;
      } else {
        $stable++;
      }

      $prev_max_temp = $day['temperature_max'];
    }

    if ($rising > $falling && $rising > $stable) {
      $trend = 'rising';
    } elseif ($falling > $rising && $falling > $stable) {
      $trend = 'falling';
    } else {
      $trend = 'stable';
    }

    return [
      'rising' => $rising,
      'falling' => $falling,
      'stable' => $stable,
      'trend' => $trend,
    ];
  }
}
