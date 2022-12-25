<?php

use App\Support\Hydrator\Attributes\CasterDateTime;
use App\Support\Hydrator\HydratorReflectionStatic;

class PlaceWork extends HydratorReflectionStatic
{
    public string $companyName;
    #[CasterDateTime]
    public DateTime $dateStart;
    #[CasterDateTime]
    public DateTime $dateEnd;
}
