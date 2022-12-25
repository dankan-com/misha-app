<?php

use App\Support\Hydrator\Attributes\CasterInt;
use App\Support\Hydrator\Attributes\CasterType;
use App\Support\Hydrator\HydratorReflectionStatic;

class RootDto extends HydratorReflectionStatic
{
    public string $firstname;
    public string $lastname;
    public string $post;
    public int $status;
    public float $salary;
    #[CasterInt]
    public bool $probation;
    public Location $location;
    #[App\Support\Hydrator\Attributes\Collection(PlaceWork::class)]
    public array $placeWorks;
}

