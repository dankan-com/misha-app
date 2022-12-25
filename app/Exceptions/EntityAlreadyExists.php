<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class EntityAlreadyExists extends \Exception implements HttpExceptionInterface
{
    public function getStatusCode(): int
    {
        return 409;
    }

    public function getHeaders(): array
    {
        return [];
    }
}
