<?php

namespace Infra\Repositories\User;

use Domain\Financial\Entities\User;
use Domain\Financial\UseCases\User\{
    GetUserBalanceUseCase,
    GetUserByIdUseCase,
    ListAllUsersUseCase,
    ListUsersAndMovementsUseCase,
    RemoveUserUseCase,
    RegisterUserUseCase,
    UpdateUserOpeningBalanceUseCase
};
use Exception;

class UserRepository implements GetUserByIdUseCase, ListAllUsersUseCase, RemoveUserUseCase, RegisterUserUseCase, ListUsersAndMovementsUseCase, UpdateUserOpeningBalanceUseCase, GetUserBalanceUseCase
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

    public function listUsersAndMovements(): array
    {
        throw new Exception("Not implemented");
    }

    public function updateUserOpeningBalance(User $user, float $value): User
    {
        throw new Exception("Not implemented");
    }

    public function getUserBalance(User $user): float
    {
        throw new Exception("Not implemented");
    }
}
