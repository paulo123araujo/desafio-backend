<?php

namespace App\Api\V1\Main\Presenters\Controllers\Movement;

use App\Api\V1\Main\Presenters\Contracts\{ApiRequest, ApiResponse, ControllerInterface};
use Infra\Repositories\Movement\MovementRepository;

class ListMovementsController implements ControllerInterface
{
    private MovementRepository $repository;

    public function __construct(MovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {
        $queryParams = $request->queryString();

        if (!isset($queryParams["filtered"])) {
            $data = $this->repository->listAllMovements();
        } else {
            $data = $this->repository->listMovementsByDate($queryParams["filtered"]);
        }

        return new ApiResponse(
            200,
            [],
            [
                "data" => $data
            ]
        );
    }
}
