<?php
declare(strict_types=1);

namespace App\Modules\Plan\UseCase\Destroy;

use App\Support\Hydrator\HydratorReflectionStatic;

class Command extends HydratorReflectionStatic
{
    public string $date;
}
