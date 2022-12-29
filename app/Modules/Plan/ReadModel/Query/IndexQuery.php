<?php

namespace App\Modules\Plan\ReadModel\Query;

use App\Support\Hydrator\HydratorFlatStatic;

class IndexQuery extends HydratorFlatStatic
{
    public string $dateStart;
    public string $dateEnd;
}
