<?php

namespace App\Models\User\Services;

use App\Models\User\User;

class ActivateUserService
{
    public function execute($token)
    {
        $user = User::query()->where('token', $token)->first();

        if (!$user) return;

        $user['email_verified_at'] = now();
        $user->save();
    }
}
