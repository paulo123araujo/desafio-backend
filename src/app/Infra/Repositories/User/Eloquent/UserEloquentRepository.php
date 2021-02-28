<?php

namespace Infra\Repositories\User\Eloquent;

use Domain\Financial\Entities\{Email, User};
use Domain\Financial\UseCases\User\{
    GetUserByIdUseCase,
    ListAllUsersUseCase,
    RemoveUserUseCase,
    RegisterUserUseCase
};
use Infra\Models\User as ModelUser;
use Infra\Repositories\User\UserRepository;

class UserEloquentRepository extends UserRepository implements GetUserByIdUseCase, ListAllUsersUseCase, RemoveUserUseCase, RegisterUserUseCase
{
    private string $model;

    public function __construct(string $model)
    {
        $this->model = $model;
    }

    public function getUserById(int $id): User
    {
        $modelUser = $this->model::findOrFail($id);
        $user = $this->mountUserByModel($modelUser);

        return $user;
    }

    public function listAllUsers(): array
    {
        $users = $this->model::select([
            "users.id", "users.email", "users.birthday"
        ])->get()->toArray();
        return $users;
    }

    public function registerUser(User $user): User
    {
        $userModel = new ModelUser();
        $userModel->email = $user->email()->email();
        $userModel->birthday = $user->birthDay()->format("Y-m-d");
        $userModel->save();

        $newUser = $this->mountUserByModel($userModel);
        return $newUser;
    }

    public function removeUser(User $user): void
    {
        $modelUser = ModelUser::findOrFail($user->id())->delete();
    }

    private function mountUserByModel(ModelUser $modelUser): User
    {
        return new User(
            $modelUser->id,
            Email::create($modelUser->email),
            new \DateTimeImmutable($modelUser->birthday),
            new \DateTimeImmutable($modelUser->created_at),
            new \DateTime($modelUser->updated_at),
            isset($modelUser->opening_balance) ? $modelUser->opening_balance : 0.000
        );
    }
}
