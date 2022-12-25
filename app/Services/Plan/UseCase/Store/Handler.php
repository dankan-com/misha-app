<?php
declare(strict_types=1);

namespace App\Services\Plan\UseCase\Store;

use App\Services\Plan\UseCase\AbstractHandler;

class Handler extends AbstractHandler
{
    public function handle(Command $command)
    {
        $this->guardPlanDayIsFree($command->day);
        $this->repository->store($command->toArray());
    }
}
