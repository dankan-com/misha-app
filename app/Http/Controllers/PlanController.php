<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Plan\{IndexRequest, StoreRequest};
use App\Services\Plan\ReadModel\Index;
use App\Services\Plan\UseCase\Store\Handler as StoreHandler;
use App\Services\Plan\UseCase\Store\Command as StoreCommand;
use App\Support\Http\ApiResponse;
use Illuminate\Http\JsonResponse;

class PlanController extends Controller
{

    public function __construct(
        private Index $readIndex,
        private StoreHandler $storeHandler,
    ) {
    }

    public function index(IndexRequest $request): JsonResponse
    {
        $result =  $this->readIndex->handle($request->validated());
        return ApiResponse::successData($result)->toJson();
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $this->storeHandler->handle(StoreCommand::fromArray($request->validated()));
        return ApiResponse::created()->toJson();
    }
}
