<?php
declare(strict_types=1);

namespace App\Services\Plan\UseCase;

use App\Services\Plan\Repository;
use App\Exceptions\{EntityNotFoundException, EntityAlreadyExists};

abstract class AbstractHandler
{
    public function __construct(protected Repository $repository)
    {
    }

    protected function guardPlanExists(int $id): void
    {
        if (null === $this->repository->get($id)) {
            throw new EntityNotFoundException('Расписание не найдено');
        }
    }

    protected function guardPlanDayIsFree(string $day): void
    {
        if (null !== $this->repository->getByDay($day)) {
            throw new EntityAlreadyExists('Расписание уже есть на дату '.$day);
        }
    }


}
