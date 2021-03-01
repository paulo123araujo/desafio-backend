<?php

namespace Domain\Financial\UseCases\User;

use Domain\Financial\Entities\User;

interface GetUserBalanceUseCase
{
    public function getUserBalance(User $user): float;
}
