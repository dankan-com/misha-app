<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Plan\{DestroyRequest, IndexRequest, ShowRequest, StoreRequest, UpdateRequest};
use App\Modules\Plan\ReadModel\{Index, OnDate};
use App\Modules\Plan\UseCase\Store\Handler as StoreHandler;
use App\Modules\Plan\UseCase\Store\Command as StoreCommand;
use App\Modules\Plan\UseCase\Destroy\Handler as DestroyHandler;
use App\Modules\Plan\UseCase\Destroy\Command as DestroyCommand;
use App\Modules\Plan\UseCase\Update\Handler as UpdateHandler;
use App\Modules\Plan\UseCase\Update\Command as UpdateCommand;
use App\Modules\Plan\ReadModel\Query\IndexQuery;
use App\Support\Http\ApiResponse;
use Illuminate\Http\JsonResponse;

class PlanController extends Controller
{

    public function __construct(
        private Index $readIndex,
        private OnDate $readOnDate,
        private StoreHandler $storeHandler,
        private DestroyHandler $destroyHandler,
        private UpdateHandler $updateHandler,
    ) {
    }

    public function index(IndexRequest $request): JsonResponse
    {
        $result =  $this->readIndex->handle(IndexQuery::fromArray($request->validated()));
        return ApiResponse::successData($result)->toJson();
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $this->storeHandler->handle(StoreCommand::fromArray($request->validated()));
        return ApiResponse::created()->toJson();
    }

    public function show(ShowRequest $request): JsonResponse
    {
        $result =  $this->readOnDate->handle($request->validated()['date']);
        if ($result === null) {
            return ApiResponse::notFound('Расписание не найдено')->toJson();
        }
        return ApiResponse::successData($result)->toJson();
    }

    public function destroy(DestroyRequest $request)
    {
        $this->destroyHandler->handle(DestroyCommand::fromArray($request->validated()));
        return ApiResponse::successEmpty()->toJson();
    }

    public function update(UpdateRequest $request)
    {
        $this->updateHandler->handle(UpdateCommand::fromArray($request->validated()));
        return ApiResponse::successEmpty()->toJson();
    }
}
