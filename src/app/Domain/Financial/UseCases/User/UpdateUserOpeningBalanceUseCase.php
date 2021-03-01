<?php

namespace Domain\Financial\UseCases\User;

use Domain\Financial\Entities\User;

interface UpdateUserOpeningBalanceUseCase
{
    public function updateUserOpeningBalance(User $user, float $value): User;
}
