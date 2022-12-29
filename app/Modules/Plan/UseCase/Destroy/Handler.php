<?php
declare(strict_types=1);

namespace App\Modules\Plan\UseCase\Destroy;

use App\Modules\Plan\UseCase\AbstractHandler;

class Handler extends AbstractHandler
{
    public function handle(Command $command)
    {
        $model = $this->getPlanOrFail($command->date);
        $this->repository->destroy($model);
    }
}
