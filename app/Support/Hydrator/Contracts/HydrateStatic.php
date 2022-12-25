<?php

declare(strict_types=1);

namespace App\Support\Hydrator\Contracts;

interface HydrateStatic
{
    /**
     * @param array<mixed> $data
     */
    public static function fromArray(array $data): static;

    /**
     * @return array<mixed> $data
     */
    public function toArray(): array;
}
