<?php

namespace App\Api\V1\Main\Presenters\Contracts;

interface ControllerInterface
{
    public function handle(ApiRequest $request): ApiResponse;
}
