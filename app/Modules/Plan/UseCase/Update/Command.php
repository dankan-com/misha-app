<?php
declare(strict_types=1);

namespace App\Modules\Plan\UseCase\Update;

use App\Modules\Plan\ReadModel\Dto\PClass;
use App\Support\Hydrator\Attributes\Collection;
use App\Support\Hydrator\HydratorReflectionStatic;

class Command extends HydratorReflectionStatic
{
    public string $day;
    #[Collection(PClass::class)]
    public array $classes;
}
