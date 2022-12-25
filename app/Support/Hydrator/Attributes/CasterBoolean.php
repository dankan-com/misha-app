<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Attributes;

use App\Support\Hydrator\Contracts\AttributeCaster;
use Attribute;
use JetBrains\PhpStorm\Pure;

#[Attribute]
class CasterBoolean extends Caster
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(self::class);
    }

    public function cast(mixed $value): bool
    {
        return (bool)$value;
    }
}
