<?php

namespace Tests\Feature;

use App\Modules\Integration\Domain\OpenWeather\OpenWeatherResource;
use Tests\TestCase;

class OpenWeatherResourceTest extends TestCase
{
    public function testEndPoint(): void
    {
        $resource = new OpenWeatherResource();

        $this->assertEquals('https://api.openweathermap.org', $resource->endpoint());
    }

    public function testDataJson(): void
    {
        $resource = new OpenWeatherResource();

        $this->assertEquals('JSON', $resource->dataType()->name);
    }
}
