<?php

namespace App\Modules\Integration\Domain\OpenWeather\Weather;

use App\Modules\Integration\Core\Concerns\Crud;
use App\Modules\Integration\Core\Concerns\RequestBodyFormat;
use App\Modules\Integration\Core\Concerns\RequestMethod;
use App\Modules\Integration\Core\Facades\BaseModel;
use App\Modules\Integration\Core\Facades\RequestOptions;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

final class CurrentWeatherModel extends BaseModel implements Crud
{
    public function __construct(public CurrentWeatherResource $resource)
    {
    }

    public static function list(CurrentWeatherSamplingClause $samplingClause): Collection
    {
        $data = $samplingClause->toArray();
        $collection = collect();

        foreach ($data['cities'] as $city) {
            $model = CurrentWeatherModel::find($city);
            $collection->add($model->attributes);
        }

        return $collection;
    }

    /**
     * @throws Exception
     */
    public static function find($city): self
    {
        /**
         * @var CurrentWeatherModel $model
         */

        $model = App::make(self::class);

        $response = $model->resource->fetch('', new RequestOptions(
            method: RequestMethod::GET,
            body: [
                'q' => $city,
                'units' => 'metric',
            ],
            bodyFormat: RequestBodyFormat::QUERY
        ));

        $model->setAttributes($response);

        return $model;
    }

    public static function create(array $attributes)
    {
    }

    public function update(array $attributes)
    {
    }
}

