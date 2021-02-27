<?php

namespace App\V1\Presenters\Contracts;

interface RequestInterface
{
    public function url(): string;
    public function data(): array;
    public function query(): array;
}
