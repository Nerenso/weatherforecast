<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherForecastData extends Model
{
    protected $fillable = [
        'requested_at',
        'latitude',
        'longitude',
        'open_mateo_api_response',
    ];
}
