<?php

namespace App\Models\Address\DTO;

use App\DTO\BaseDTO;

class AddressDTO extends BaseDTO
{
    public function __construct(
        public readonly string $addressName,
        public readonly string $addressNumber,
        public readonly string $city,
        public readonly string $state,
        public readonly string $zipCode,
        public readonly string $country
    ){
        parent::__construct();
    }

    public static function fromRequest($request)
    {
        return new self(
            addressName:  $request->validated('address-line-input'),
            addressNumber: $request->validated('number-input'),
            city:  $request->validated('city-input'),
            state:  $request->validated('state-input'),
            zipCode:  $request->validated('zip-code-input'),
            country:  $request->validated('country-input')
        );
    }
}
