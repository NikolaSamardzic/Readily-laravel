<?php

namespace App\Models\User\Services;

use App\Models\User\User;

class GetActiveUsersService
{
    public function execute()
    {
        return User::query()->where('is_banned','=',0)->whereNotNull('email_verified_at')->get();
    }
}
