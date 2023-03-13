<?php

namespace Tests\Feature;

use App\Modules\Integration\Domain\OpenWeather\Weather\CurrentWeatherResource;
use Tests\TestCase;

class CurrentWeatherResourceTest extends TestCase
{
    public function testEndPoint(): void
    {
        $resource = new CurrentWeatherResource();

        $this->assertEquals('https://api.openweathermap.org/data/2.5/weather', $resource->endpoint());
    }

    public function testDataJson(): void
    {
        $resource = new CurrentWeatherResource();

        $this->assertEquals('JSON', $resource->dataType()->name);
    }
}
