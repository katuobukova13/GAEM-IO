<?php

namespace App\Modules\Integration\Domain\OpenWeather\Weather;

use App\Modules\Integration\Core\Concerns\DataType;
use App\Modules\Integration\Domain\OpenWeather\OpenWeatherResource;

class CurrentWeatherResource extends OpenWeatherResource
{
    public function endpoint(): string
    {
        return self::buildUrl(parent::endpoint(), '/data/2.5/weather');
    }

    public function dataType(): DataType
    {
        return parent::dataType();
    }
}
