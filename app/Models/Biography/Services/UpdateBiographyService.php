<?php

namespace App\Models\Biography\Services;

use App\Models\Biography\DTO\UpdateBiographyDTO;

class UpdateBiographyService
{
    public function execute(UpdateBiographyDTO $dto, $biography)
    {
        return tap($biography)->update([
            'biography_text' => $dto->biographyText
        ])->save();
    }
}
