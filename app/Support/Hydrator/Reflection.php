<?php

declare(strict_types=1);

namespace App\Support\Hydrator;

use App\Support\Hydrator\Contracts\AttributeCaster;
use App\Support\Hydrator\Contracts\AttributeCollection;
use App\Support\Hydrator\Contracts\HydrateStatic;
use ReflectionObject;
use ReflectionProperty;

class Reflection
{
    private array $allowTypes = ['int','float', 'bool', 'array', 'string'];
    /**
     * @inerhitDoc
     * @param object $data
     * @param array<mixed> $source
     */
    public static function hydration(object $data, array $source): void
    {
        $instance = new self;

        $instance->filling($data, $source);
    }

    public function filling(object $data, array $source)
    {
        $properties = $this->getProperties($data);
        foreach ($properties as $property) {

            $value = $source[$property->getName()] ?? null;
            $type = $property->getType()->getName();
            $name = $property->getName();

            if (!isset($source[$name])) {
                continue;
            }

            $attributes = $this->resolveAttributes($property);

            foreach ($attributes as $attribute) {

                //преобразование кастеров
                if ($attribute instanceof AttributeCaster) {
                    $value = $attribute->cast($source[$name]);
                }
                //заполнение массива объектов
                if ($attribute instanceof AttributeCollection) {
                    $value = $attribute->handle($source[$name]);
                }
            }

            //создание и гидрация объектов
            if (!in_array($type, $this->allowTypes, true) && is_array($source[$property->getName()])) {
                $className = $type;
                $value = new $className;
                if ($value instanceof HydrateStatic) {
                    $this->filling($value, $source[$name]);
                }
            }

            $data->{$name} = $value;
        }


    }

    public function resolveAttributes(ReflectionProperty $property): array
    {
        $objects = [];

        $property->setAccessible(true);

        if ($attributes = $property->getAttributes()) {
            foreach ($attributes as $attribute) {
                $newInstance = $attribute->newInstance();
                $objects[] = $newInstance;
            }
        }

        return $objects;
    }

    /**
     * @param object $data
     * @return array<ReflectionProperty>
     */
    public function getProperties(object $data): array
    {
        $reflection = new ReflectionObject($data);

        return $reflection->getProperties();
    }
}
