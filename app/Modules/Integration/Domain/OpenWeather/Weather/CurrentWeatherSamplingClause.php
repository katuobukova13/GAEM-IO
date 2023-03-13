<?php

namespace App\Modules\Integration\Domain\OpenWeather\Weather;

use JetBrains\PhpStorm\ArrayShape;

final class CurrentWeatherSamplingClause
{
    public function __construct(
        public readonly array $cities = [],
    )
    {
    }

    #[ArrayShape([
        'cities' => "array",
    ])]
    public function toArray(): array
    {
        return [
            'cities' => $this->cities,
        ];
    }
}
