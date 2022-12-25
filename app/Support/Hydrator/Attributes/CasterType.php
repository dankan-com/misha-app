<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Attributes;

use App\Support\Hydrator\Contracts\AttributeCaster;
use DateTime;
use Attribute;

#[Attribute]
abstract class CasterType implements AttributeCaster
{
    public const BOOL = 1;
    public const STRING = 2;
    public const INT = 3;
    public const FLOAT = 4;
    public const STRING_DATETIME = 10;

    public function __construct(public int $type)
    {
    }

    public function cast(mixed $value): float|bool|int|string|DateTime
    {
        return match ($this->type) {
            self::BOOL => (bool)$value,
            self::STRING => (string)$value,
            self::INT => (int)$value,
            self::FLOAT => (float)$value,
            self::STRING_DATETIME => new DateTime($value),
        };
    }
}
