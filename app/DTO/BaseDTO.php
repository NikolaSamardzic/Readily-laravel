<?php

namespace App\DTO;

abstract class BaseDTO
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
    ){}
}
