<?php
declare(strict_types=1);

namespace App\Modules\Plan\ReadModel\Dto;

use App\Support\Hydrator\HydratorFlatStatic;

class PClass extends HydratorFlatStatic
{
    public string $name;
    public string $task;
}
