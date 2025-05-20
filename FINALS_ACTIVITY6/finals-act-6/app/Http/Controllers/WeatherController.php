<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function showWeatherPage(Request $request)
    {
        $cities = [
            $request->query('city1', 'London'),
            $request->query('city2'),
            $request->query('city3')
        ];

        $apiKey = env('OPENWEATHER_API_KEY');
        $columns = [];

        foreach ($cities as $index => $city) {
            if ($city) {
                $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                    'q' => $city,
                    'appid' => $apiKey,
                    'units' => 'metric'
                ]);

                $columnKey = 'column' . ($index + 1);

                if ($response->successful()) {
                    $columns[$columnKey] = [
                        'city' => $city,
                        'temperature' => $response['main']['temp'],
                        'description' => $response['weather'][0]['description'],
                        'humidity' => $response['main']['humidity']
                    ];
                } else {
                    $columns[$columnKey] = [
                        'city' => $city,
                        'error' => 'Could not fetch weather data'
                    ];
                }
            }
        }

        return view('weather', ['row' => $columns]);
    }
}
