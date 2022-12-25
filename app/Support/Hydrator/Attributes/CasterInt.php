<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Attributes;

use App\Support\Hydrator\Contracts\AttributeCaster;
use Attribute;

#[Attribute]
class CasterInt extends Caster
{
    public function __construct()
    {
        parent::__construct(self::class);
    }

    public function cast(mixed $value): int
    {
        return (int)$value;
    }
}
