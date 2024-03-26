<?php

namespace App\Models\User\Services;

use App\Models\User\Resources\UserResource;
use App\Models\User\User;

class GetUsersAdminPanelService
{
    public function __construct(
        protected GetActiveUsersService $activeUsersService,
        protected GetDeletedUsersService $deletedUsers,
        protected GetBannedUsersService $bannedUsers
    ){}

    public function execute()
    {
        return [
            'active' => $this->activeUsersService->execute(),
            'deleted' => $this->deletedUsers->execute(),
            'banned' => $this->bannedUsers->execute()
        ];
    }
}
