<?php

namespace App\Models\Avatar\DTO;

use App\DTO\BaseDTO;

class UpdateAvatarDTO extends BaseDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $src,
        public readonly int $userId,
        public readonly ?string $created_at,
        public readonly ?string $updated_at
    )
    {
        parent::__construct(
            $id,
            $created_at,
            $updated_at
        );
    }

    public static function fromService($avatar, $src) : UpdateAvatarDTO
    {
        return new self(
            id: $avatar['id'],
            src: $src,
            userId: $avatar['user_id'],
            created_at: $avatar['created_at'],
            updated_at: $avatar['updated_at'],
        );
    }
}
