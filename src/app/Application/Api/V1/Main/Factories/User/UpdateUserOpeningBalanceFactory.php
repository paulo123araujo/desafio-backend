<?php

namespace App\Api\V1\Main\Factories\User;

use App\Api\V1\Main\Presenters\Contracts\ControllerInterface;
use App\Api\V1\Main\Presenters\Controllers\User\UpdateUserOpeningBalanceController;
use Infra\Models\User;
use Infra\Repositories\User\Eloquent\UserEloquentRepository;

class UpdateUserOpeningBalanceFactory
{
    public static function get(): ControllerInterface
    {
        $model = User::class;
        $repository = new UserEloquentRepository($model);
        return new UpdateUserOpeningBalanceController($repository);
    }
}
