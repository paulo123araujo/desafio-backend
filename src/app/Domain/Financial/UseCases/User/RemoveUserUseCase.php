<?php

namespace Domain\Financial\UseCases\User;

use Domain\Financial\Entities\User;

interface RemoveUserUseCase
{
    public function removeUser(User $user): void;
}
