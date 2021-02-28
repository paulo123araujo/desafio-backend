<?php

namespace Infra\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $guard = ["created_at", "updated_at"];

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }
}
