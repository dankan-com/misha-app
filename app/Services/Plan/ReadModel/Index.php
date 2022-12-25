<?php
declare(strict_types=1);

namespace App\Services\Plan\ReadModel;

use App\Models\Plan;

class Index
{
    public function handle($filter): array
    {
        $result = Plan::query()
            ->whereBetween('day', [$filter['dateStart'], $filter['dateEnd']])
            ->orderBy('day')
            ->get();
        $result->transform(function ($item) {
            return Item::fromArray($item->toArray());
        });
        return $result->toArray();
    }
}
