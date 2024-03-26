<?php

namespace App\Models\User\DTO;

use App\DTO\BaseDTO;

class CreateUserDTO extends BaseDTO
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $username,
        public readonly string $email,
        public readonly string $password,
        public readonly string $phone,
        public readonly ?int $addressId,
        public readonly int $roleId,
    ){
        parent::__construct();
    }

    public static function fromRequest($request, $addressId) : CreateUserDTO
    {
        return new self(
            firstName:  $request->validated('first-name-input'),
            lastName: $request->validated('last-name-input'),
            username:  $request->validated('username-input'),
            email:  $request->validated('email-input'),
            password:  $request->validated('password-input'),
            phone:  $request->validated('phone-input'),
            addressId: $addressId,
            roleId:  $request->validated('role-input'),
        );
    }
}
