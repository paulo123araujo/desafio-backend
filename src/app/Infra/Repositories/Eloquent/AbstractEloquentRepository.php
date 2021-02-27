<?php

namespace Infra\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractEloquentRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
