<?php

namespace App\Models\User\Services;

use App\Models\User\DTO\CreateUserDTO;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

class CreateUserService
{
    public function execute(CreateUserDTO $dto)
    {
        return User::query()->create([
            'first_name' => $dto->firstName,
            'last_name' => $dto->lastName,
            'username' => $dto->username,
            'email' => $dto->email,
            'password' => Hash::make($dto->password, [
                'salt' => env('SALT_STRING'),
            ]),
            'phone' => $dto->phone,
            'token' => bin2hex(random_bytes(10)),
            'address_id' => $dto->addressId,
            'role_id' => $dto->roleId
        ]);
    }
}
