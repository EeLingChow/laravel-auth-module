<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginLog extends Model
{
    protected $fillable = ['user_id', 'ip_address', 'user_agent'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
