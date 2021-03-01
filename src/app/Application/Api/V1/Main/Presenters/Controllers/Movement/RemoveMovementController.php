<?php

namespace App\Api\V1\Main\Presenters\Controllers\Movement;

use App\Api\V1\Main\Presenters\Contracts\{ApiRequest, ApiResponse, ControllerInterface};
use App\Api\V1\Main\Presenters\DTO\DTOMovement;
use Domain\Financial\Entities\{Movement, MovementType};
use Infra\Repositories\Movement\MovementRepository;

class RemoveMovementController implements ControllerInterface
{
    private MovementRepository $repository;

    public function __construct(MovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {
        $urlVariables = $request->urlVariables();
        $userId = $urlVariables["userId"];
        $movementId = $urlVariables["movementId"];

        $movement = $this->repository->getMovementById($movementId);

        $this->repository->removeMovement($movement);
        return new ApiResponse(
            200,
            ["Content-Type" => "application/json"],
            [
                "status" => "ok"
            ]
        );
    }
}
