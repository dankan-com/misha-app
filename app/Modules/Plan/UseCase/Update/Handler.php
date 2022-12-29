<?php
declare(strict_types=1);

namespace App\Modules\Plan\UseCase\Update;

use App\Modules\Plan\UseCase\AbstractHandler;

class Handler extends AbstractHandler
{
    public function handle(Command $command)
    {
        $model = $this->getPlanOrFail($command->day);
        $model->classes = $command->classes;
        $this->repository->update($model);
    }
}
