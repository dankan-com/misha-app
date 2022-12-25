<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Attributes;

use App\Support\Hydrator\Contracts\AttributeCollection;
use App\Support\Hydrator\Reflection;
use Attribute;
use RuntimeException;

#[Attribute]
class Collection implements AttributeCollection
{
    public function __construct(public string $className)
    {
    }

    public function handle(mixed $source): array
    {
        $collection = [];
        if (!is_array($source)) {
            throw new RuntimeException('Ошибка создания коллекции. Данные должны быть массивом.');
        }

        foreach ($source as $key => $data) {
            $collection[$key] = new $this->className;
            Reflection::hydration($collection[$key], $data);
        }

        return $collection;
    }
}
