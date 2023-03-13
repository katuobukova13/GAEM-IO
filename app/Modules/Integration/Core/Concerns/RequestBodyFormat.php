<?php

namespace App\Modules\Integration\Core\Concerns;

enum RequestBodyFormat
{
    case JSON;
    case QUERY;
}
