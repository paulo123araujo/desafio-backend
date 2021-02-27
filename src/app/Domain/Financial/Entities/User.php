<?php

namespace Domain\Financial\Entities;

use Carbon\Carbon;
use DateTimeImmutable;

class User
{
    private int $id;
    private Email $email;
    private \DateTimeImmutable $birthDay;
    private \DateTimeImmutable $createdAt;
    private \DateTime $updatedAt;

    private float $openingBalance;

    public function __construct(
        int $id = null,
        Email $email,
        \DateTimeImmutable $birthDay,
        float $openingBalance = 0.000
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->birthDay = $birthDay;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->openingBalance = $openingBalance;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function openingBalance(): float
    {
        return $this->openingBalance;
    }

    public function birthDay(): \DateTimeImmutable
    {
        return $this->birthDay;
    }

    public function setOpeningBalance(float $openingBalance): void
    {
        $this->openingBalance = $openingBalance;
        $this->updatedAt = Carbon::now();
    }
}
