<?php

namespace App\Models\User\Services;

use App\Models\Address\DTO\AddressDTO;
use App\Models\Address\Services\CreateAddressService;
use App\Models\Avatar\Avatar;
use App\Models\Avatar\DTO\CreateAvatarDTO;
use App\Models\Avatar\DTO\UpdateAvatarDTO;
use App\Models\Avatar\Services\CreateAvatarService;
use App\Models\Avatar\Services\UpdateAvatarService;
use App\Models\Biography\Biography;
use App\Models\Biography\DTO\UpdateBiographyDTO;
use App\Models\Biography\Services\UpdateBiographyService;
use App\Models\User\DTO\UpdateUserDTO;
use Illuminate\Support\Facades\File;

class UpdateUserLogicService
{
    public function __construct(
        protected CreateAddressService $createAddress,
        protected CreateAvatarService $createAvatar,
        protected UpdateBiographyService $updateBiography,
        protected UpdateUserService $updateUser,
        protected UpdateAvatarService $updateAvatar
    ){}

    public function execute($request, $user)
    {
        $address['id'] = null;
        if(!is_null($request->validated('address-line-input'))){
            $address = $this->createAddress->execute(AddressDTO::fromRequest($request));
        }


        $this->updateUser->execute(UpdateUserDTO::fromRequest($request,$address['id'],$user),$user);

        if(!is_null($request->post('biography-input'))){
            $biography = Biography::query()->where('user_id','=',$user['id'])->first();
            $this->updateBiography->execute(UpdateBiographyDTO::fromRequest($request,$biography),$biography);
        }

        if(!is_null($request->file('user-avatar'))){
            if(isset($user->avatar)){
                $oldAvatarName = $user->avatar['src'];
                $imageName = time() . '.' . $request->file('user-avatar')->extension();
                $avatar = Avatar::query()->where('user_id','=',$user['id'])->first();
                $this->updateAvatar->execute(UpdateAvatarDTO::fromService($avatar,$imageName),$avatar);
                $request->file('user-avatar')->move(public_path('assets/images/avatars'), $imageName);
                File::delete(public_path('/assets/images/avatars/' . $oldAvatarName));
            }else{
                $imageName = time() . '.' . $request->file('user-avatar')->extension();
                $avatar = $this->createAvatar->execute(CreateAvatarDTO::fromService($imageName, $user['id']));
                $request->file('user-avatar')->move(public_path('assets/images/avatars'), $imageName);
            }
        }

    }
}
