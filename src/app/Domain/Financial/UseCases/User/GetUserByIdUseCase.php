<?php

namespace Domain\Financial\UseCases\User;

use Domain\Financial\Entities\User;

interface GetUserByIdUseCase
{
    public function getUserById(int $id): User;
}
