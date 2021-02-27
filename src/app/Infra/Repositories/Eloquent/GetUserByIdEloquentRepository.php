<?php

namespace Infra\Repositories\Eloquent;

use Domain\Financial\Entities\Email;
use Domain\Financial\Entities\User;
use Domain\Financial\UseCases\User\GetUserByIdUseCase;
use Infra\Models\User as ModelsUser;

class GetUserByIdEloquentRepository extends AbstractEloquentRepository implements GetUserByIdUseCase
{
    public function getUserById(int $id): User
    {
        $modelUser = $this->model::findOrFail($id);
        $user = $this->mountUserByModel($modelUser);

        return $user;
    }

    private function mountUserByModel(ModelsUser $modelUser): User
    {
        return new User(
            $modelUser->id,
            Email::create($modelUser->email),
            new \DateTimeImmutable($modelUser->birthday),
            $modelUser->opening_balance
        );
    }
}
