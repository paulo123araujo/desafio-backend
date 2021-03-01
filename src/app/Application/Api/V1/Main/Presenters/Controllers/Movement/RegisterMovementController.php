<?php

namespace App\Api\V1\Main\Presenters\Controllers\Movement;

use App\Api\V1\Main\Presenters\Contracts\{ApiRequest, ApiResponse, ControllerInterface};
use App\Api\V1\Main\Presenters\DTO\DTOMovement;
use Domain\Financial\Entities\{Movement, MovementType};
use Infra\Repositories\Movement\MovementRepository;

class RegisterMovementController implements ControllerInterface
{
    private MovementRepository $repository;

    public function __construct(MovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {
        $userId = $request->urlVariables()["userId"];
        $dataBody = $request->dataBody();
        $movement = new Movement(
            0,
            MovementType::create($dataBody["type"]),
            $dataBody["value"],
            $userId
        );

        $newMovement = $this->repository->registerMovement($movement);
        return new ApiResponse(
            201,
            ["Content-Type" => "application/json"],
            [
                "status" => "ok",
                "data" => [
                    "movement" => (new DTOMovement($newMovement))->toResponseFormatWithoutUserId()
                ]
            ]
        );
    }
}
