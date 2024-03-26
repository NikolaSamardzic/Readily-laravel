<?php

namespace App\Models\User\Services;

use App\Models\User\User;

class GetDeletedUsers
{
    public function execute()
    {
        return User::query()->whereNotNull('deleted_at')->whereNotNull('email_verified_at')->withTrashed()->get();
    }
}
