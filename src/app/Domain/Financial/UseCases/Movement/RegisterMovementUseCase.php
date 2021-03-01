<?php

namespace Domain\Financial\UseCases\Movement;

use Domain\Financial\Entities\Movement;

interface RegisterMovementUseCase
{
    public function registerMovement(Movement $movement): Movement;
}
