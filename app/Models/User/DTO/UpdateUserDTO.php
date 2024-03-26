<?php

namespace App\Models\User\DTO;

use App\DTO\BaseDTO;
use phpDocumentor\Reflection\PseudoTypes\ArrayShape;

class UpdateUserDTO extends BaseDTO
{
    public function __construct(
        $id,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $username,
        public readonly string $email,
        public readonly string $phone,
        public readonly ?int $addressId,
        $created_at,
        public readonly ?string $deleted_at,
        public readonly ?int $is_banned
    )
    {
        parent::__construct(
            $id,
            $created_at,
        );
    }

    public static function fromRequest($request, $addressId, $user) : UpdateUserDTO
    {
        return new self(
            id: $user['id'],
            firstName:  $request->validated('first-name-input'),
            lastName: $request->validated('last-name-input'),
            username:  $request->validated('username-input'),
            email:  $request->validated('email-input'),
            phone:  $request->validated('phone-input'),
            addressId: $addressId,
            created_at: $user['created_at'],
            deleted_at: $user['deleted_at'],
            is_banned: $user['is_banned'],
        );
    }
}
