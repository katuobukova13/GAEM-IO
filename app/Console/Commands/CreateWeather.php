<?php

namespace App\Console\Commands;

use App\Http\Controllers\CityController;
use App\Models\Weather;
use App\Services\CityService;
use App\Services\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class CreateWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create weather in database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $citiesInfo = App::make(WeatherService::class)->list(['Limassol', 'Barselona', 'Amsterdam']);

        foreach ($citiesInfo as $city) {
            Weather::create([
                'city' => $city['name'],
                'temperature' => round($city['main']['temp']),
            ]);
        }

        return Command::SUCCESS;
    }
}
