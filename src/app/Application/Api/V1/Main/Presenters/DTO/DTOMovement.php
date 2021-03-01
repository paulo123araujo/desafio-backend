<?php

namespace App\Api\V1\Main\Presenters\DTO;

use Domain\Financial\Entities\Movement;

class DTOMovement
{
    private Movement $movement;

    public function __construct(Movement $movement)
    {
        $this->movement = $movement;
    }

    public function toResponseFormatWithoutUserId(): array
    {
        return [
            "id" => $this->movement->id(),
            "type" => $this->movement->type()->type(),
            "value" => $this->movement->value()
        ];
    }

    public function toResponseFormatWithUserId(): array
    {
        return [
            "id" => $this->movement->id(),
            "type" => $this->movement->type()->type(),
            "value" => $this->movement->value(),
            "user_id" => $this->movement->userId()
        ];
    }
}
