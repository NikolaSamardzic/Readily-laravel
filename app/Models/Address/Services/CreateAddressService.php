<?php

namespace App\Models\Address\Services;

use App\Models\Address\Address;
use App\Models\Address\DTO\AddressDTO;

class CreateAddressService
{
    public function execute(AddressDTO $dto)
    {
        return Address::query()->firstOrCreate([
            'address_name' => $dto->addressName,
            'address_number' => $dto->addressNumber,
            'city' => $dto->city,
            'state' => $dto->state,
            'zip_code' => $dto->zipCode,
            'country' => $dto->country,
        ]);
    }
}
