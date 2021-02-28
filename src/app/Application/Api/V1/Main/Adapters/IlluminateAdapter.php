<?php

namespace App\Api\V1\Main\Adapters;

use App\Api\V1\Main\Factories\GetUserByIdFactory;
use App\Api\V1\Main\Presenters\Contracts\ApiRequest;
use Illuminate\Http\{Request, Response};

class IlluminateAdapter
{
    public function getUserById(Request $request, int $userId): Response
    {
        $urlVariables = ["userId" => $userId];
        $headers = (array) $request->headers;
        $url = $request->fullUrl();

        $query = $this->getQueryString($request);

        $apiRequest = new ApiRequest($url, $query, $request->all(), $headers, $urlVariables);

        $controller = GetUserByIdFactory::get();
        $response = $controller->handle($apiRequest);
        return response($response->dataBody(), $response->statusCode(), $response->headers());
    }

    private function getQueryString(Request $request): array
    {
        $explodedUrl = explode("?", $request->fullUrl());

        if (!isset($explodedUrl[1])) {
            return [];
        }

        $valuesSeparated = explode("&", $explodedUrl[1]);
        $query = [];
        foreach ($valuesSeparated as $valueSeparated) {
            list($key, $value) = explode("=", $valueSeparated);
            $query[$key] = $value;
        }

        return $query;
    }
}
