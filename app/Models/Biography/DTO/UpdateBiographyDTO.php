<?php

namespace App\Models\Biography\DTO;

use App\DTO\BaseDTO;

class UpdateBiographyDTO extends BaseDTO
{
    public function __construct(
        $id,
        public readonly string $biographyText,
        public readonly int $userId,
        $created_at,
    )
    {
        parent::__construct(
            $id,
            $created_at,
        );
    }

    public static function fromRequest($request, $biography) : UpdateBiographyDTO
    {
        return new self(
            id: $biography['id'],
            biographyText: $request->validated('biography-input'),
            userId: $biography['user_id'],
            created_at: $biography['created_at'],
        );
    }
}
