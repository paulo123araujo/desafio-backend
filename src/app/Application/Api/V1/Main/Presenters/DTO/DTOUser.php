<?php

namespace App\Api\V1\Main\Presenters\DTO;

use Domain\Financial\Entities\User;

class DTOUser
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toResponseFormat(): array
    {
        return [
            "id" => $this->user->id(),
            "email" => $this->user->email()->email(),
            "birthDay" => $this->user->birthDay()->format("Y-m-d")
        ];
    }
}
