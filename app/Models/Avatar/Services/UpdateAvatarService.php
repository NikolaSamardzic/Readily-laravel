<?php

namespace App\Models\Avatar\Services;

use App\Models\Avatar\DTO\UpdateAvatarDTO;

class UpdateAvatarService
{
    public function execute(UpdateAvatarDTO $dto, $avatar)
    {
        return tap($avatar)->update([
            'src' => $dto->src
        ])->save();
    }
}
