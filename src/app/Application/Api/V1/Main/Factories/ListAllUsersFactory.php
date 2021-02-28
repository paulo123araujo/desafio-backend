<?php

namespace App\Api\V1\Main\Factories;

use App\Api\V1\Main\Presenters\Contracts\ControllerInterface;
use App\Api\V1\Main\Presenters\Controllers\ListAllUsersController;
use Infra\Models\User;
use Infra\Repositories\User\Eloquent\UserEloquentRepository;

class ListAllUsersFactory
{
    public static function get(): ControllerInterface
    {
        $model = User::class;
        $repository = new UserEloquentRepository($model);
        return new ListAllUsersController($repository);
    }
}
