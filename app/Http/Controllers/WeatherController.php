<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $cityName = 'Kuressaare';  
        $cacheKey = 'weather_data';  

        
        if (Cache::has($cacheKey)) {
            $weatherData = Cache::get($cacheKey);
        } else {
            
            $apiKey = config('services.weather.key');
            $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$cityName&units=metric&appid={$apiKey}";
            $client = new Client();

            try {
                $response = $client->get($apiUrl);
                $weatherData = json_decode($response->getBody(), true);
        
                Cache::put($cacheKey, $weatherData, now()->addMinutes(15));  
            } catch (\Exception $e) {
                
                return view('api_error', ['error' => $e->getMessage()]);
            }
        }
        return view('weather', ['weatherData' => $weatherData]);
    }
}
