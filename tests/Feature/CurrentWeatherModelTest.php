<?php

namespace Tests\Feature;

use App\Modules\Integration\Domain\OpenWeather\Weather\CurrentWeatherModel;
use App\Modules\Integration\Domain\OpenWeather\Weather\CurrentWeatherSamplingClause;
use Tests\TestCase;

class CurrentWeatherModelTest extends TestCase
{

    public function testFind(): void
    {
        $city = 'Limassol';

        $response = CurrentWeatherModel::find($city);

        $this->assertEquals($response->attributes['name'], $city);
        $this->assertNotEmpty($response->attributes['main']['temp']);
    }

    public function testList(): void
    {
        $cities = ['Barcelona', "Limassol", "Amsterdam"];

        $response = CurrentWeatherModel::list(new CurrentWeatherSamplingClause(cities: $cities));

        $this->assertEquals($response[0]['name'], $cities[0]);
        $this->assertEquals($response[1]['name'], $cities[1]);
        $this->assertEquals($response[2]['name'], $cities[2]);
        $this->assertNotEmpty($response[0]['main']['temp']);
        $this->assertNotEmpty($response[1]['main']['temp']);
        $this->assertNotEmpty($response[2]['main']['temp']);
        $this->assertCount(3, $response->toArray());
    }
}
