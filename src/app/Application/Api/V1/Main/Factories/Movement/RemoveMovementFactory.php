<?php

namespace App\Api\V1\Main\Factories\Movement;

use App\Api\V1\Main\Presenters\Contracts\ControllerInterface;
use App\Api\V1\Main\Presenters\Controllers\Movement\RemoveMovementController;
use Infra\Models\Movement;
use Infra\Repositories\Movement\Eloquent\MovementEloquentRepository;

class RemoveMovementFactory
{
    public static function get(): ControllerInterface
    {
        $model = Movement::class;
        $repository = new MovementEloquentRepository($model);
        return new RemoveMovementController($repository);
    }
}
