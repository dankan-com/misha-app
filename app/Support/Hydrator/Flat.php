<?php

declare(strict_types=1);

namespace App\Support\Hydrator;

class Flat
{
    /**
     * @inerhitDoc
     * @param object $data
     * @param array<mixed> $source
     */
    public static function hydration(object $data, array $source): void
    {
        foreach (get_class_vars($data::class) as $key => $property) {
            if (array_key_exists($key, $source)) {
                $data->{$key} = $source[$key];
            }
        }
    }
}
