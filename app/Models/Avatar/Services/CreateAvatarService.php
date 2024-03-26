<?php

namespace App\Models\Avatar\Services;

use App\Models\Avatar\Avatar;
use App\Models\Avatar\DTO\CreateAvatarDTO;

class CreateAvatarService
{
    public function execute(CreateAvatarDTO $dto)
    {
        return Avatar::query()->create([
            'src' => $dto->src,
            'user_id' => $dto->userId,
        ]);
    }
}
