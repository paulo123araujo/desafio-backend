<?php

namespace App\Api\V1\Main\Adapters;

use App\Api\V1\Main\Factories\User\{
    GetUserByIdFactory,
    ListAllUsersFactory,
    RegisterUserFactory,
    RemoveUserFactory
};
use App\Api\V1\Main\Presenters\Contracts\ApiRequest;
use Illuminate\Http\{Request, Response};

class UserIlluminateAdapter
{
    public function getUserById(Request $request, int $userId): Response
    {
        $urlVariables = ["userId" => $userId];
        $apiRequest = $this->createApiRequest($request, $urlVariables);

        $controller = GetUserByIdFactory::get();
        $response = $controller->handle($apiRequest);
        return response($response->dataBody(), $response->statusCode(), $response->headers());
    }

    public function listAllUsers(Request $request): Response
    {
        $apiRequest = $this->createApiRequest($request);

        $controller = ListAllUsersFactory::get();
        $response = $controller->handle($apiRequest);
        return response($response->dataBody(), $response->statusCode(), $response->headers());
    }

    public function registerUser(Request $request): Response
    {
        $apiRequest = $this->createApiRequest($request);

        $controller = RegisterUserFactory::get();
        $response = $controller->handle($apiRequest);
        return response($response->dataBody(), $response->statusCode(), $response->headers());
    }

    public function removeUser(Request $request, int $userId): Response
    {
        $urlVariables = ["userId" => $userId];

        $apiRequest = $this->createApiRequest($request, $urlVariables);

        $controller = RemoveUserFactory::get();
        $response = $controller->handle($apiRequest);
        return response($response->dataBody(), $response->statusCode(), $response->headers());
    }

    private function createApiRequest(Request $request, $urlVariables = []): ApiRequest
    {
        $headers = (array) $request->headers;
        $url = $request->fullUrl();

        $query = $this->getQueryString($request);

        return new ApiRequest($url, $query, $request->all(), $headers, $urlVariables);
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
