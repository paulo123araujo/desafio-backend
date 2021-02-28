<?php

namespace App\Api\V1\Main\Presenters\Controllers;

use App\Api\V1\Main\Presenters\Contracts\{
    ControllerInterface,
    ApiRequest,
    ApiResponse
};
use App\Api\V1\Main\Presenters\DTO\DTOUser;
use Domain\Financial\Entities\Email;
use Domain\Financial\Entities\User;
use Infra\Repositories\User\UserRepository;

class RegisterUserController implements ControllerInterface
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {
        $data = $request->dataBody();
        $userData = new User(0, Email::create($data["email"]), new \DateTimeImmutable($data["birthDay"]), null, null, 0.000);
        $user = $this->repository->registerUser($userData);

        return new ApiResponse(200, ["Content-Type" => "application/json"], [
            "status" => "ok",
            "data" => [
                "user" => (new DTOUser($user))->toResponseFormat()
            ]
        ]);
    }
}
