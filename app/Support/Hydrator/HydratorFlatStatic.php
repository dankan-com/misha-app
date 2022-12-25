<?php

declare(strict_types=1);

namespace App\Support\Hydrator;

use JetBrains\PhpStorm\Pure;

abstract class HydratorFlatStatic implements Contracts\HydrateStatic
{
    final public function __construct()
    {
    }

    /**
     * @inerhitDoc
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        Flat::hydration($instance, $data);

        return $instance;
    }

    /**
     * @inerhitDoc
     */
    #[Pure]
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
