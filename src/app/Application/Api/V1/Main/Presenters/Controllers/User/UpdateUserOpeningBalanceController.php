<?php

namespace App\Api\V1\Main\Presenters\Controllers\User;

use App\Api\V1\Main\Presenters\Contracts\{ApiRequest, ApiResponse, ControllerInterface};
use App\Api\V1\Main\Presenters\DTO\DTOUser;
use Illuminate\Cache\Repository;
use Infra\Repositories\User\UserRepository;

class UpdateUserOpeningBalanceController implements ControllerInterface
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
        $updatedUser = $this->repository->updateUserOpeningBalance($user, $request->dataBody()["openingBalance"]);

        return new ApiResponse(
            200,
            ["Content-Type" => "application/json"],
            [
                "status" => "ok",
                "data" => [
                    "user" => (new DTOUser($updatedUser))->toResponseFormat()
                ]
            ]
        );
    }
}
