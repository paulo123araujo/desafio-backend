<?php

namespace App\Api\V1\Main\Presenters\Contracts;

class ApiRequest
{
    private string $url;
    private array $queryString;
    private array $dataBody;
    private array $headers;
    private array $urlVariables;

    public function __construct
    (
        string $url,
        array $queryString,
        array $dataBody,
        array $headers,
        array $urlVariables
    ) {
        $this->url = $url;
        $this->queryString = $queryString;
        $this->dataBody = $dataBody;
        $this->headers = $headers;
        $this->urlVariables = $urlVariables;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function queryString(): array
    {
        return $this->queryString;
    }

    public function dataBody(): array
    {
        return $this->dataBody;
    }

    public function headers(): array
    {
        return $this->headers;
    }

    public function urlVariables(): array
    {
        return $this->urlVariables;
    }
}
