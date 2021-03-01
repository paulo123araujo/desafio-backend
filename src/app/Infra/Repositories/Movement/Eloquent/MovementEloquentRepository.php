<?php

namespace Infra\Repositories\Movement\Eloquent;

use DateTime;
use Domain\Financial\Entities\{
    Email,
    Movement,
    MovementType,
    User
};
use Illuminate\Support\Facades\DB;
use Infra\Models\Movement as ModelsMovement;
use Infra\Repositories\Movement\MovementRepository;

class MovementEloquentRepository extends MovementRepository
{
    private string $model;

    public function __construct(string $model)
    {
        $this->model = $model;
    }

    public function listAllMovements(): array
    {
        $movements = $this->model::with(["user"])->all()->toArray();
        return $movements;
    }

    public function listAllMovementsPaginated(): array
    {
        $movements = $this->model::with(["user"])->paginate();
        return (array) $movements;
    }

    public function listMovementsByDate(DateTime $date): array
    {
        $movements = DB::table("movements")
            ->select(["users.id as user_id", "users.email", "users.birthday", "users.created_at as user_created_at", "users.opening_balance", "movements.*"])
            ->whereDate("created_at", "=", $date)
            ->join("users", "users.id", "=", "movements.user_id")
            ->get()
            ->toArray();

        return $movements;
    }

    public function registerMovement(Movement $movement): Movement
    {
        $movementModel = new ModelsMovement();
        $movementModel->value = $movement->value();
        $movementModel->type = $movement->type()->type();
        $movementModel->user_id = $movement->userId();
        $movementModel->save();

        $newMovement = $this->mountMovement($movementModel);

        return $newMovement;
    }

    public function removeMovement(Movement $movement): void
    {
        $this->model::findOrFail($movement->id())->delete();
    }

    public function getMovementById(int $id): Movement
    {
        return $this->mountMovement($this->model::findOrFail($id));
    }

    public function mountMovement(ModelsMovement $movementModel): Movement
    {
        return new Movement(
            $movementModel->id,
            MovementType::create($movementModel->type),
            $movementModel->value,
            $movementModel->user_id
        );
    }
}
