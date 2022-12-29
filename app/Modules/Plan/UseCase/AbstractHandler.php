<?php
declare(strict_types=1);

namespace App\Modules\Plan\UseCase;

use App\Models\Plan;
use App\Exceptions\{EntityAlreadyExists, EntityNotFoundException};

abstract class AbstractHandler
{
    public function __construct(protected Repository $repository)
    {
    }

    protected function guardPlanExists(string $date): void
    {
        if (null === $this->repository->getByDay($date)) {
            throw new EntityNotFoundException('Расписание не найдено');
        }
    }

    protected function guardPlanDayIsFree(string $day): void
    {
        if (null !== $this->repository->getByDay($day)) {
            throw new EntityAlreadyExists('Расписание уже есть на дату '.$day);
        }
    }

    protected function getPlanOrFail(string $date): Plan
    {
        $model = $this->repository->getByDay($date);
        if (null === $model) {
            throw new EntityNotFoundException('Расписание не найдено');
        }
        return $model;
    }

}
