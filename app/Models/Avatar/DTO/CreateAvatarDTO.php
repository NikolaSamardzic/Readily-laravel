<?php

namespace App\Models\Avatar\DTO;

use App\DTO\BaseDTO;

class CreateAvatarDTO extends BaseDTO
{
    public function __construct(
        public readonly string $src,
        public readonly int $userId
    )
    {
        parent::__construct();
    }

    public static function fromService($src, $userId) : CreateAvatarDTO
    {
        return new self(
            src: $src,
            userId: $userId
        );
    }
}
