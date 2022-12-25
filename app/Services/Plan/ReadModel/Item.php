<?php
declare(strict_types=1);

namespace App\Services\Plan\ReadModel;

use App\Services\Plan\Dto\PClass;
use App\Support\Hydrator\Attributes\Collection;
use App\Support\Hydrator\HydratorReflectionStatic;

class Item extends HydratorReflectionStatic
{
    public int $id;
    public string $day;
    #[Collection(PClass::class)]
    public array $classes;
}
