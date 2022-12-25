<?php
declare(strict_types=1);

namespace App\Services\Plan\UseCase\Store;

use App\Support\Hydrator\Attributes\Collection;
use App\Support\Hydrator\HydratorReflectionStatic;
use App\Services\Plan\Dto\PClass;

class Command extends HydratorReflectionStatic
{
    public string $day;
    #[Collection(PClass::class)]
    public array $classes;
}
