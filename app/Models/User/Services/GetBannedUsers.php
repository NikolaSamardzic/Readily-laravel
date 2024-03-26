<?php

namespace App\Models\User\Services;

use App\Models\User\User;

class GetBannedUsers
{
    public function execute()
    {
        return User::query()->whereNull('deleted_at')->whereNotNull('email_verified_at')->where('is_banned','=',1)->get();
    }
}
