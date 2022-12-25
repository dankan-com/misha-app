<?php
declare(strict_types=1);

namespace App\Support\Hydrator\Contracts;

interface AttributeCollection
{
    public function handle(mixed $source): mixed;
}
