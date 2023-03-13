<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpenWeather\Weather\WeatherIndexRequest;
use App\Services\WeatherService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class WeatherController extends Controller
{
    /**
     * @param string $city
     * @return array
     */
    public function show(string $city): array
    {
        $weatherService = App::make(WeatherService::class);

        return $weatherService->find($city);
    }

    /**
     * @param WeatherIndexRequest $request
     * @param WeatherService $weatherService
     * @return Collection
     * @throws \Exception
     */
    public function index(WeatherIndexRequest $request, WeatherService $weatherService): Collection
    {
        $attributes = $request->validated();

        return $weatherService->list(cities: $attributes['cities']);
    }
}
