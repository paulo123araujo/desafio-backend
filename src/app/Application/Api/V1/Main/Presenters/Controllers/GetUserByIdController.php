<?php

namespace App\Api\V1\Main\Presenters\Controllers;

use App\Api\V1\Main\Presenters\Contracts\{
    ControllerInterface,
    ApiRequest,
    ApiResponse
};
use Infra\Repositories\User\UserRepository;

class GetUserByIdController implements ControllerInterface
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {
        $userId = $request->urlVariables()["userId"];
        $user = $this->repository->getUserById($userId);

        return new ApiResponse(200, [
            "Content-Type" => "application/json"
        ], [
            "status" => "ok",
            "data" => [
                "user" => [
                    "id" => $user->id(),
                    "email" => $user->email()->email(),
                    "birthDay" => $user->birthDay()->format("Y-m-d")
                ]
            ]
        ]);
    }
}
