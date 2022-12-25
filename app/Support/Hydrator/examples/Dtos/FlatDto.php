<?php

use App\Support\Hydrator\HydratorFlatStatic;

class FlatDto extends HydratorFlatStatic
{
    public string $firstname;
    public string $lastname;
    public string $post;
    public int $status;
    public float $salary;
}
