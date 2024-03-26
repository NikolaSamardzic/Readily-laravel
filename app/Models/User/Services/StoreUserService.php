<?php

namespace App\Models\User\Services;

use App\Mail\SignUp;
use App\Models\Address\DTO\AddressDTO;
use App\Models\Address\Services\CreateAddressService;
use App\Models\Avatar\DTO\CreateAvatarDTO;
use App\Models\Avatar\Services\CreateAvatarService;
use App\Models\Biography\DTO\CreateBiographyDTO;
use App\Models\Biography\Services\CreateBiographyService;
use App\Models\User\DTO\CreateUserDTO;
use Illuminate\Support\Facades\Mail;

class StoreUserService
{
    public function __construct(
        protected CreateAddressService $createAddress,
        protected CreateUserService $createUser,
        protected CreateBiographyService $createBiography,
        protected CreateAvatarService $createAvatar
    ){}

    public function execute($request)
    {
        $address['id'] = null;

        if(!is_null($request->validated('address-line-input'))){
            $address = $this->createAddress->execute(AddressDTO::fromRequest($request));
        }

        $user = $this->createUser->execute(CreateUserDTO::fromRequest($request, $address['id']));

        if(!is_null($request->validated('biography-input'))){
            $biography = $this->createBiography->execute(CreateBiographyDTO::fromRequest($request,$user['id']));
        }

        if(!is_null($request->file('user-avatar'))){
            $imageName = time() . '.' . $request->file('user-avatar')->extension();
            $avatar = $this->createAvatar->execute(CreateAvatarDTO::fromService($imageName, $user['id']));
            $request->file('user-avatar')->move(public_path('assets/images/avatars'), $imageName);
        }

        $link = $user['token'];
        Mail::to($user['email'])->send(new SignUp($link));
    }
}
