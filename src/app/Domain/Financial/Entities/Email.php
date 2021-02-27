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
        if (!preg_match("/^[a-z0-9.]+@[a-z0-9]+\.[a-z]+\.([a-z]+)?$/i", $email)) {
            throw new \Exception("Email inválido");
        }
    }

    public function email(): string
    {
        return $this->email;
    }
}
