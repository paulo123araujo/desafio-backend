<?php

namespace Domain\Financial\UseCases\User;

use Domain\Financial\Entities\User;

interface RegisterUserUseCase
{
    public function registerUser(User $user): User;
}
