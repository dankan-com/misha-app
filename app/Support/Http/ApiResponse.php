<?php
declare(strict_types=1);

namespace App\Support\Http;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{
    public function __construct(
        protected int $code = 200,
        protected ?string $message = null,
        protected ?Arrayable $data = null,
    ) {
    }

    public static function unauthorized(): self
    {
        return new self(Response::HTTP_UNAUTHORIZED);
    }

    public static function forbidden(string $message = 'Доступ запрещён'): self
    {
        return new self(Response::HTTP_FORBIDDEN, $message);
    }

    public static function notFound(string $message): self
    {
        return new self(Response::HTTP_NOT_FOUND, $message);
    }

    public static function created(?array $data=null): self
    {
        return new self(Response::HTTP_CREATED, null, $data);
    }

    public static function successData(Arrayable $data): self
    {
        return new self(Response::HTTP_OK, null, $data);
    }

    public static function successMessage(string $message): self
    {
        return new self(Response::HTTP_OK, $message);
    }

    public static function successEmpty(): self
    {
        return new self(Response::HTTP_OK);
    }

    public static function errorMessage(string $message): self
    {
        return new self(Response::HTTP_BAD_REQUEST, $message);
    }

    public static function errorEmpty(): self
    {
        return new self(Response::HTTP_BAD_REQUEST);
    }

    public function toJson(): JsonResponse
    {
        $content = [];
        if (isset($this->data)) {
            $content['data'] = $this->data;
        }

        if ($this->message) {
            $content['message'] = $this->message;
        }

        return new JsonResponse(
            $content,
            $this->code
        );
    }

}
