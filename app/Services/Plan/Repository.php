<?php
declare(strict_types=1);

namespace App\Services\Plan;
use App\Models\Plan;

class Repository
{
    public function get(int $id): ?Plan
    {
        /** @var Plan|null $model */
        $model = Plan::query()->whereKey($id)->first();
        return $model;
    }

    public function getByDay(string $day): ?Plan
    {
        /** @var Plan|null $model */
        $model = Plan::query()->where('day', $day)->first();
        return $model;
    }

    public function store(array $data): Plan
    {
        return Plan::create($data);
    }
}
