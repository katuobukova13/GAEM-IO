<?php

namespace App\Services;

use App\Modules\Integration\Domain\OpenWeather\Weather\CurrentWeatherModel;
use App\Modules\Integration\Domain\OpenWeather\Weather\CurrentWeatherSamplingClause;
use Exception;
use Illuminate\Support\Collection;

class WeatherService
{
    /**
     * @param string $city
     * @return array
     * @throws Exception
     */
    public function find(string $city): array
    {
        $city = CurrentWeatherModel::find($city);

        return $city->attributes;
    }

    /**
     * @param array $cities
     * @return Collection
     * @throws Exception
     */
    public function list(array $cities): Collection
    {
        return CurrentWeatherModel::list(new CurrentWeatherSamplingClause(cities: $cities));
    }
}
