<?php

namespace App\Modules\Integration\Core\Concerns;

interface Crud
{
    public static function find(string $city);

    public static function create(array $attributes);

    public function update(array $attributes);
}
