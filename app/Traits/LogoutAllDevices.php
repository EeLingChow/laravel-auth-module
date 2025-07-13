<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait LogoutAllDevices
{
    public function logoutAllDevices()
    {
        if (method_exists($this, 'tokens')) {
            $this->tokens()->delete();
        }

        DB::table('sessions')->where('user_id', $this->id)->delete();
    }
}
