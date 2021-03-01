<?php

namespace Domain\Financial\UseCases\Movement;

interface ListMovementsByDateUseCase
{
    public function listMovementsByDate($filter): array;
}
