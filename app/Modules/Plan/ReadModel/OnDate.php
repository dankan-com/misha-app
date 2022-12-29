<?php
declare(strict_types=1);

namespace App\Modules\Plan\ReadModel;

use App\Models\Plan;
use App\Modules\Plan\ReadModel\Dto\Item;

class OnDate
{
    public function handle(string $date): ?Item
    {
        $result = Plan::query()
            ->where('day', $date)
            ->first();

        if ($result === null) {
            return null;
        }
        return Item::fromArray($result->toArray());
    }
}
