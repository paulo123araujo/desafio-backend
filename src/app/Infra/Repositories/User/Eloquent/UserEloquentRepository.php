<?php

namespace Infra\Repositories\User\Eloquent;

use DateTimeImmutable;
use Domain\Financial\Entities\{Email, User};
use Exception;
use Illuminate\Support\Facades\DB;
use Infra\Models\User as ModelUser;
use Infra\Repositories\User\UserRepository;

class UserEloquentRepository extends UserRepository
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
        $now = new DateTimeImmutable();
        $diffYears = $now->diff($user->birthDay())->format("%Y");
        if ($diffYears < 18) {
            throw new Exception("Too young, maybe later");
        }

        $userModel = new ModelUser();
        $userModel->email = $user->email()->email();
        $userModel->birthday = $user->birthDay()->format("Y-m-d");
        $userModel->save();

        $newUser = $this->mountUserByModel($userModel);
        return $newUser;
    }

    public function removeUser(User $user): void
    {
        $modelUser = ModelUser::findOrFail($user->id());
        if (!empty($modelUser->movements()->get()->toArray())) {
            throw new Exception("User cannot be removed");
        }
        $modelUser->delete();
    }

    public function listUsersAndMovements(): array
    {
        $data = ModelUser::with("movements")->get()->toArray();
        return $data;
    }

    public function updateUserOpeningBalance(User $user, float $value): User
    {
        $modelUser = $this->model::findOrFail($user->id());
        $modelUser->update(["opening_balance" => $value]);
        $modelUser->save();
        $user->setOpeningBalance($value, $modelUser->updated_at);
        return $user;
    }

    public function getUserBalance(User $user): float
    {
        $debits = DB::table("movements")
            ->selectRaw("SUM(movements.value) as debits")
            ->where("movements.type", "=", "debit")
            ->where("movements.user_id", "=", $user->id())
            ->get()
            ->toArray();

        $credits = DB::table("movements")
            ->selectRaw("SUM(movements.value) as credits")
            ->where("movements.type", "=", "credit")
            ->where("movements.user_id", "=", $user->id())
            ->get()
            ->toArray();

        $reversals = DB::table("movements")
            ->selectRaw("SUM(movements.value) as reversals")
            ->where("movements.type", "=", "reversal")
            ->where("movements.user_id", "=", $user->id())
            ->get()
            ->toArray();

        return $user->openingBalance() - $debits[0]->debits + $credits[0]->credits - $reversals[0]->reversals;
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
