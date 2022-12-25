<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Contracts;

interface AttributeCaster
{
    public function cast(mixed $value): mixed;
}
