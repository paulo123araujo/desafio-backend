<?php

namespace Infra\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table = "movements";

    protected $guard = ["created_at"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
