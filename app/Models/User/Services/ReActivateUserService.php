<?php

namespace App\Models\User\Services;

use App\Models\User\User;

class ReActivateUserService
{
    public function execute($user)
    {
        $user['deleted_at'] = null;
        $user->save();
    }
}
