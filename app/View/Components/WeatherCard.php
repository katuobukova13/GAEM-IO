<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WeatherCard extends Component
{
    public $city;

//    public string $currentTemp;
//
//    public string $threeHoursAgoTemp;
//
//    public string $sixHoursAgoTemp;
//
//    public string $nineHoursAgoTemp;
//
//    public string $twelveHoursAgoTemp;

    /**
     * Create a new component instance.
     */
    public function __construct($city)
        //    string $currentTemp, string $threeHoursAgoTemp, string $sixHoursAgoTemp, string $nineHoursAgoTemp, string $twelveHoursAgoTemp)
    {
        $this->city = $city;
//        $this->currentTemp = $currentTemp;
//        $this->threeHoursAgoTemp = $threeHoursAgoTemp;
//        $this->sixHoursAgoTemp = $sixHoursAgoTemp;
//        $this->nineHoursAgoTemp = $nineHoursAgoTemp;
//        $this->twelveHoursAgoTemp = $twelveHoursAgoTemp;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.weather-card');
    }
}
