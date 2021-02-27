<?php

namespace Domain\Financial\UseCases\User;

use Domain\Financial\Entities\User;

interface RegisterUser
{
    public function registerUser(User $user): User;
}
