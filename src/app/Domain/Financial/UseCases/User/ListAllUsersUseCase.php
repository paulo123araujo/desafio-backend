<?php

namespace Domain\Financial\UseCases\User;

interface ListAllUsersUseCase
{
    /**
     * @return User[]
     */
    public function listAllUsers(): array;
}
