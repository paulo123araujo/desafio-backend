<?php

namespace Domain\Financial\Entities;

class Movement
{
    private MovementType $type;
    private float $value;
    private int $userId;
    private int $id;

    public function __construct(int $id = null, MovementType $type, float $value, int $userId)
    {
        $this->id = $id;
        $this->type = $type;
        $this->value = $value;
        $this->userId = $userId;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function type(): MovementType
    {
        return $this->type;
    }

    public function value(): float
    {
        return $this->value;
    }
}
