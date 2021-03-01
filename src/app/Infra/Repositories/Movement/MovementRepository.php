<?php

namespace Infra\Repositories\Movement;

use DateTime;
use Domain\Financial\Entities\Movement;
use Domain\Financial\UseCases\Movement\{
    ListAllMovementsPaginatedUseCase,
    ListAllMovementsUseCase,
    ListMovementsByDateUseCase,
    RegisterMovementUseCase,
    RemoveMovementUseCase
};

class MovementRepository implements ListAllMovementsUseCase, ListMovementsByDateUseCase, RegisterMovementUseCase, RemoveMovementUseCase
{
    public function listAllMovements(): array
    {
        throw new \Exception("Not Implemented");
    }

    public function listMovementsByDate($filter): array
    {
        throw new \Exception("Not Implemented");
    }

    public function registerMovement(Movement $movement): Movement
    {
        throw new \Exception("Not Implemented");
    }

    public function removeMovement(Movement $movement): void
    {
        throw new \Exception("Not Implemented");
    }

    public function getMovementById(int $id): Movement
    {
        throw new \Exception("Not Implemented");
    }
}
