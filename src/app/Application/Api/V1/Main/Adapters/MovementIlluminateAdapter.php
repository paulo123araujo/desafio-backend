<?php

namespace App\Api\V1\Main\Adapters;

use App\Api\V1\Main\Factories\Movement\{
    ListMovementsFactory,
    RegisterMovementFactory,
    RemoveMovementFactory
};
use App\Api\V1\Main\Presenters\Contracts\ApiRequest;
use Illuminate\Http\{Request, Response};

class MovementIlluminateAdapter
{
    public function listMovements(Request $request)
    {
        $apiRequest = $this->createApiRequest($request);

        $controller = ListMovementsFactory::get();
        $response = $controller->handle($apiRequest);

        $filename = "movements.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, [
            "user_id",
            "email",
            "birthday",
            "user_created_at",
            "opening_balance",
            "movement_id",
            "movement_type",
            "movement_value",
            "movement_created_at",
            "movement_updated_at"
        ]);

        foreach($response->dataBody()["data"] as $row) {
            fputcsv($handle, [
                $row->user_id,
                $row->email,
                $row->birthday,
                $row->user_created_at,
                $row->opening_balance,
                $row->id,
                $row->type,
                $row->value,
                $row->created_at,
                $row->updated_at
            ]);
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()->download($filename, $filename, $headers);
    }

    public function registerMovement(Request $request, int $userId): Response
    {
        $urlVariables = ["userId" => $userId];
        $apiRequest = $this->createApiRequest($request, $urlVariables);

        $controller = RegisterMovementFactory::get();
        $response = $controller->handle($apiRequest);
        return response($response->dataBody(), $response->statusCode(), $response->headers());
    }

    public function removeMovement(Request $request, int $userId, int $movementId): Response
    {
        $urlVariables = ["userId" => $userId, "movementId" => $movementId];
        $apiRequest = $this->createApiRequest($request, $urlVariables);

        $controller = RemoveMovementFactory::get();
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
