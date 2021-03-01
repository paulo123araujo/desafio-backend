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

class MovementRepository implements ListAllMovementsUseCase, ListAllMovementsPaginatedUseCase, ListMovementsByDateUseCase, RegisterMovementUseCase, RemoveMovementUseCase
{
    public function listAllMovements(): array
    {
        throw new \Exception("Not Implemented");
    }

    public function listAllMovementsPaginated(): array
    {
        throw new \Exception("Not Implemented");
    }

    public function listMovementsByDate(DateTime $date): array
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
