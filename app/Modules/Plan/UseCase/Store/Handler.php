<?php
declare(strict_types=1);

namespace App\Modules\Plan\UseCase\Store;

use App\Modules\Plan\UseCase\AbstractHandler;

class Handler extends AbstractHandler
{
    public function handle(Command $command)
    {
        $this->guardPlanDayIsFree($command->day);
        $this->repository->store($command->toArray());
    }
}
