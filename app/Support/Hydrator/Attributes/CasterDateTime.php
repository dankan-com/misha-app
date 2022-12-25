<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Attributes;

use Attribute;
use DateTime;

#[Attribute]
class CasterDateTime extends Caster
{
    public function __construct()
    {
        parent::__construct(self::class);
    }

    public function cast(mixed $value): DateTime
    {
        return new DateTime($value);
    }
}
