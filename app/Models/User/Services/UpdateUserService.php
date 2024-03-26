<?php

namespace App\Models\User\Services;

use App\Models\User\DTO\UpdateUserDTO;

class UpdateUserService
{
    public function execute(UpdateUserDTO $dto, $user)
    {
        return tap($user)->update([
            'first_name' => $dto->firstName,
            'last_name' => $dto->lastName,
            'username' => $dto->username,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'address_id' => $dto->addressId
        ])->save();
    }
}
