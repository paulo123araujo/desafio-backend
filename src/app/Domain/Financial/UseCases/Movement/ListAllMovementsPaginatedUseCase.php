<?php

namespace Domain\Financial\UseCases\Movement;

interface ListAllMovementsPaginatedUseCase
{
    public function listAllMovementsPaginated(): array;
}
