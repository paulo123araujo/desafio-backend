<?php

namespace Domain\Financial\UseCases\Movement;

interface ListAllMovementsUseCase
{
    /**
     * @return Movement[]
     */
    public function listAllMovements(): array;
}
