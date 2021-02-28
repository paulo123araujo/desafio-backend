<?php

namespace Domain\Financial\Entities;

class Email
{
    private string $email;

    private function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    public static function create(string $email): Email
    {
        return new self($email);
    }

    private function validate(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Email inválido");
        }
    }

    public function email(): string
    {
        return $this->email;
    }
}
