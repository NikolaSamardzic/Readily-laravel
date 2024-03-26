<?php

namespace App\Models\Biography\DTO;

use App\DTO\BaseDTO;

class CreateBiographyDTO extends BaseDTO
{
    public function __construct(
        public readonly string $biographyText,
        public readonly int $userId
    )
    {
        parent::__construct();
    }

    public static function fromRequest($request, $userId) : CreateBiographyDTO
    {
        return new self(
            biographyText: $request->validated('biography-input'),
            userId: $userId
        );
    }
}
