<?php

namespace App\Api\V1\Main\Presenters\Contracts;
class ApiResponse
{
    private int $statusCode;
    private array $headers;
    private array $dataBody;

    public function __construct(int $statusCode, array $headers, array $dataBody)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->dataBody = $dataBody;
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function dataBody(): array
    {
        return $this->dataBody;
    }
}
