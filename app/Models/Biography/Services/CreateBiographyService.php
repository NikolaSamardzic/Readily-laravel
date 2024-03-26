<?php

namespace App\Models\Biography\Services;

use App\Models\Biography\Biography;
use App\Models\Biography\DTO\CreateBiographyDTO;

class CreateBiographyService
{
    public function execute(CreateBiographyDTO $dto)
    {
        return Biography::query()->create([
            'biography_text' => $dto->biographyText,
            'user_id' => $dto->userId,
        ]);
    }
}
