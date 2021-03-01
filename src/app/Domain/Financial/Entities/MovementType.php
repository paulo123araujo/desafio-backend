<?php

namespace Domain\Financial\Entities;

class MovementType
{
    private string $type;

    private function __construct(string $type)
    {
        $this->validate($type);
        $this->type = $type;
    }

    public static function create(string $type): MovementType
    {
        return new self($type);
    }

    public function validate(string $type): void
    {
        if (!in_array($type, ["debit", "credit", "reversal"])) {
            throw new \Exception("Invalid type: $type");
        }
    }

    public function type(): string
    {
        return $this->type;
    }
}
