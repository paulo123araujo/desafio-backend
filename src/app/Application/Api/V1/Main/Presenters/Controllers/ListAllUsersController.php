<?php

namespace App\Api\V1\Main\Presenters\Controllers;

use App\Api\V1\Main\Presenters\Contracts\{
    ControllerInterface,
    ApiRequest,
    ApiResponse
};
use Infra\Repositories\User\UserRepository;

class ListAllUsersController implements ControllerInterface
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {
        $users = $this->repository->listAllUsers();

        return new ApiResponse(200, ["Content-Type" => "application/json"], [
            "data" => [
                "users" => $users
            ]
        ]);
    }
}
