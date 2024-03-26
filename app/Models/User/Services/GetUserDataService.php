<?php

namespace App\Models\User\Services;

class GetUserDataService
{
    public function execute($user)
    {
        $biography = "";

        if(isset($user->biography)) $biography = $user->biography['biography_text'];

        $addressName = "";
        $addressNumber = "";
        $city = "";
        $state = "";
        $zipCode = "";
        $country = "";
        if(isset($user->address)){
            $addressName = $user->address['address_name'];
            $addressNumber = $user->address['address_number'];
            $city = $user->address['city'];
            $state = $user->address['state'];
            $zipCode = $user->address['zip_code'];
            $country = $user->address['country'];
        }

        return [
            'address' => ['address_name' => $addressName, 'address_number' => $addressNumber, 'city' => $city, 'state' => $state, 'zip_code'=>$zipCode,'country'=>$country],
            'user' => $user,
            'biography' => $biography
        ];
    }
}
