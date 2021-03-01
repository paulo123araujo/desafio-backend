<?php

namespace Domain\Financial\UseCases\Movement;

use Domain\Financial\Entities\Movement;

interface RemoveMovementUseCase
{
    public function removeMovement(Movement $movement): void;
}
