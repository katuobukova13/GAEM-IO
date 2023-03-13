<?php

namespace App\Modules\Integration\Domain\OpenWeather;

use App\Modules\Integration\Core\Concerns\DataType;
use App\Modules\Integration\Core\Facades\RequestOptions;
use App\Modules\Integration\Core\Facades\Resource;
use Exception;

class OpenWeatherResource extends Resource
{
    /**
     * @throws Exception
     */
    public function fetch(string $url = '', RequestOptions $options = null): mixed
    {
        $apiKey = config('services.openweather.key');

        return parent::fetch($url, new RequestOptions(
            method: $options->method,
            headers: collect($options->headers)->merge([
                'Accept' => 'application/json',
            ])->all(),
            body: [...$options->body, 'appid' => $apiKey],
            bodyFormat: $options->bodyFormat
        ));
    }

    public function endpoint(): string
    {
        $hostname = config('services.openweather.subdomain');

        return "https://$hostname";
    }

    public function dataType(): DataType
    {
        return DataType::JSON;
    }
}
