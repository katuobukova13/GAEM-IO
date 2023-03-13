<?php

namespace App\Http\Controllers;

use App\Models\Weather;

class WeatherCardController extends Controller
{
    public array $cities = ["Barcelona", "Limassol", "Amsterdam"];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function __invoke(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $collection = collect();

        foreach ($this->cities as $city) {
            $tempsId = $this->getTemperatures($city);
            $collection->add($tempsId);
        }

        return view('weather', [
            'citiesTemperature' => $collection
        ]);
    }

    /**
     * @param string $city
     * @return void
     */
    public function getTemperatures(string $city)
    {
        $cityWeather = Weather::where('city', '=', $city)->get()->sortBy('created_at')->pluck('temperature')->toArray();

        $currentTempId = array_key_last($cityWeather);

        return collect([
            'city' => $city,
            'currentTemp' => $cityWeather[$currentTempId],
            'threeHoursAgoTemp' => $cityWeather[$currentTempId - 3] ?? $cityWeather[$currentTempId],
            'sixHoursAgoTemp' => $cityWeather[$currentTempId - 6] ?? $cityWeather[$currentTempId],
            'nineHoursAgoTemp' => $cityWeather[$currentTempId - 9] ?? $cityWeather[$currentTempId],
            'twelveHoursAgoTemp' => $cityWeather[$currentTempId - 12] ?? $cityWeather[$currentTempId]
        ]);
    }
}
