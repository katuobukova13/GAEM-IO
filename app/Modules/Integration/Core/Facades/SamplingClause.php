<?php

namespace App\Modules\Integration\Core\Facades;

use JetBrains\PhpStorm\ArrayShape;

final class SamplingClause
{
    public function __construct(
        public readonly string    $q = '',
        public readonly int       $limit = 1,
        protected readonly string $appid = ''
    )
    {
    }

    #[ArrayShape([
        'q' => "string",
        'limit' => "int",
    ])]
    public function toArray(): array
    {
        return [
            'q' => $this->q,
            'limit' => $this->limit,
            'appid' => $this->appid
        ];
    }
}
