<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather_forecast_data', function (Blueprint $table) {
            $table->id();
            $table->float('latitude');
            $table->float('longitude');
            $table->json('open_mateo_api_response');
            $table->dateTime('requested_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_forcast_data');
    }
};
