<?php

namespace App\V1\Presenters\Contracts;

interface ControllerInterface
{
    public function handle(RequestInterface $request): ResponseInterface;
}
