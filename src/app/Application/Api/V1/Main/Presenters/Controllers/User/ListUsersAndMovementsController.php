<?php

namespace App\Api\V1\Main\Presenters\Controllers\User;

use App\Api\V1\Main\Presenters\Contracts\{ApiRequest, ApiResponse, ControllerInterface};
use Infra\Repositories\User\UserRepository;

class ListUsersAndMovementsController implements ControllerInterface
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {
        $data = $this->repository->listUsersAndMovements();
        return new ApiResponse(
            200,
            ["Content-Type" => "application/json"],
            [
                "status" => "ok",
                "data" => $data
            ]
        );
    }
}
