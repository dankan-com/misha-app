<?php
declare(strict_types=1);

namespace App\Modules\Plan\ReadModel;

use App\Models\Plan;
use App\Modules\Plan\ReadModel\Dto\Item;
use App\Modules\Plan\ReadModel\Query\IndexQuery;

class Index
{
    /**
     * @param IndexQuery $query
     * @return array<Item>
     */
    public function handle(IndexQuery $query): array
    {
        $rows = Plan::query()
            ->whereBetween('day', [$query->dateStart, $query->dateEnd])
            ->orderBy('day')
            ->get();

        $result = [];
        foreach ($rows as $row) {
            $result[] = Item::fromArray($row->toArray());
        }
        return $result;
    }
}
