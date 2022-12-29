<?php

declare(strict_types=1);

namespace App\Support\Hydrator;

use Illuminate\Contracts\Support\Arrayable;
use JetBrains\PhpStorm\Pure;

abstract class HydratorReflectionStatic implements Contracts\HydrateStatic, Arrayable
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

        Reflection::hydration($instance, $data);

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
