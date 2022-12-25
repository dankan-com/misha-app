<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Attributes;

use App\Support\Hydrator\Contracts\AttributeCaster;
use Attribute;

#[Attribute]
abstract class Caster implements AttributeCaster
{
    public function __construct(public string $className)
    {

    }
}
