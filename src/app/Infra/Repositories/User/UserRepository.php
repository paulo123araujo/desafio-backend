<?php

namespace Infra\Repositories\User;

use Domain\Financial\Entities\User;
use Domain\Financial\UseCases\User\{
    GetUserByIdUseCase,
    ListAllUsersUseCase,
    RemoveUserUseCase,
    RegisterUserUseCase
};
use Exception;

class UserRepository implements GetUserByIdUseCase, ListAllUsersUseCase, RemoveUserUseCase, RegisterUserUseCase
{
    public function getUserById(int $id): User
    {
        throw new Exception("Not implemented");
    }

    public function listAllUsers(): array
    {
        throw new Exception("Not implemented");
    }

    public function removeUser(User $user): void
    {
        throw new Exception("Not implemented");
    }

    public function registerUser(User $user): User
    {
        throw new Exception("Not implemented");
    }
}
