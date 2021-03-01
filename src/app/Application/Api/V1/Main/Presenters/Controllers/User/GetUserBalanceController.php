<?php

namespace App\Api\V1\Main\Presenters\Controllers\User;

use App\Api\V1\Main\Presenters\Contracts\ApiRequest;
use App\Api\V1\Main\Presenters\Contracts\ApiResponse;
use App\Api\V1\Main\Presenters\Contracts\ControllerInterface;
use Infra\Repositories\User\UserRepository;

class GetUserBalanceController implements ControllerInterface
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
        $balance = $this->repository->getUserBalance($user);

        return new ApiResponse(
            200,
            ["Content-Type" => "application/json"],
            ["status" => "ok", "data" => [
                "balance" => $balance
            ]]
        );
    }
}
