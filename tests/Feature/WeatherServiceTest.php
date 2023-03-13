<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\WeatherService;
use Tests\TestCase;

class WeatherServiceTest extends TestCase
{
    public function testFind(): void
    {
        $city = 'Limassol';

        $service = $this->app->make(WeatherService::class);

        $response = $service->find($city);

        $this->assertEquals($response['name'], $city);
        $this->assertNotEmpty($response['main']['temp']);
    }

    public function testList(): void
    {
        $cities = ['Barcelona', "Limassol", "Amsterdam"];

        $service = $this->app->make(WeatherService::class);

        $response = $service->list(cities: $cities);

        $this->assertEquals($response[0]['name'], $cities[0]);
        $this->assertEquals($response[1]['name'], $cities[1]);
        $this->assertEquals($response[2]['name'], $cities[2]);
        $this->assertNotEmpty($response[0]['main']['temp']);
        $this->assertNotEmpty($response[1]['main']['temp']);
        $this->assertNotEmpty($response[2]['main']['temp']);
        $this->assertCount(3, $response->toArray());
    }
}
