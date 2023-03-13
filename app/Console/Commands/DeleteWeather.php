<?php

namespace App\Console\Commands;

use App\Http\Controllers\CityController;
use App\Models\Weather;
use App\Services\CityService;
use Illuminate\Console\Command;

class DeleteWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete weather info after 36 hours';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        Weather::where('created_at', '<=', now()->subHours(36)->toDateTimeString())->delete();

        return Command::SUCCESS;
    }
}
