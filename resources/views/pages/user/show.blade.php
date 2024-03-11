@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    />

@endsection

@section('mainContent')
    <section id="user-profile-section">

        <div id="user-data" class="sign-up-container">
            <h2>Personal info</h2>

            <div id="user-avatar-placeholder-js" class="user-avatar-placeholder">
                <img src="{{asset('assets/images/avatars')}}/@if($data['user']->avatar){{$data['user']->avatar['src']}}@else{{'default-avatar.jpg'}}@endif" alt="user avatar">
            </div>

            <div class="info-container-grid personal-info-container-grid">

                <p id="first-name-title"  class="input-title">Fisrt Name</p>
                <p  class="first-name-input user-information" >{{$data['user']['first_name']}}</p>

                <p id="last-name-title" class="input-title">Last Name</p>
                <p class="last-name-input user-information">{{$data['user']['last_name']}}</p>

                <p id="username-title" class="input-title">Username</p>
                <p class="username-input user-information">{{$data['user']['username']}}</p>

                <p id="email-title" class="input-title">Email</p>
                <p class="email-input user-information">{{$data['user']['email']}}</p>

                <p id="phone-title" class="input-title">Phone</p>
                <p class="phone-input user-information">{{$data['user']['phone']}}</p>

                <p id="role-title" class="input-title">Role</p>
                <p class="role-input user-information">{{ucfirst($data['user']->role['name'])}}</p>

                <p id="biography-title" class="input-title" @empty($data['user']->biography['text'])style="display:none;" @endempty>Biography</p>
                <p class="user-information biography-input"  @empty($data['user']->biography['text'])style="display:none;" @endempty>ccxc</p>

            </div>

            <h2>Address info</h2>

            <div  class="info-container-grid address-info-container-grid">

                <p id="address-line-title"  class="input-title">Address line</p>
                <p  class="address-line-input user-information" >@if(isset($data['user']->address)){{$data['user']->address['address_name']}}@else/@endif</p>


                <p id="number-title"  class="input-title">Number</p>
                <p  class="number-input user-information">@if(isset($data['user']->address)){{$data['user']->address['address_number']}}@else/@endif</p>


                <p id="city-title" class="input-title">City</p>
                <p  class="city-input user-information" >@if(isset($data['user']->address)){{$data['user']->address['city']}}@else/@endif</p>


                <p id="state-title" class="input-title">State</p>
                <p  class="state-input user-information" >@if(isset($data['user']->address)){{$data['user']->address['state']}}@else/@endif</p>


                <p id="zip-code-title" class="input-title ">Zip-code</p>
                <p  class="zip-code-input user-information">@if(isset($data['user']->address)){{$data['user']->address['zip_code']}}@else/@endif</p>


                <p id="country-title" class="input-title">Country</p>
                <p class="user-information country-input" >@if(isset($data['user']->address)){{$data['user']->address['country']}}@else/@endif</p>
            </div>

            <div class="server-messages success-server-messages">
            </div>

            <div class="button-option-container">
                <form action="{{route('users.destroy',['user'=>$data['user']->id])}}" onsubmit="return deleteUser()" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="danger-option" id="delete-account-button" value="Delete">
                </form>

                <a href="{{route('users.edit',['id'=>$data['user']['id']])}}" id="update-account-button" class="safe-option">Update</a>
            </div>
        </div>
    </section>


    @if($data['user']['role_id'] == 3)
        <div id="writter-option-wrapper">
            <div class="admin-option-container">
                <div class="admin-option">
                    <a href="{{route('books.index',['id'=>$data['user']['id']])}}"></a>
                    <div class="option-name-container">
                        <p>Books</p>
                    </div>
                    <div class="option-icon-container">
                        <img src="{{asset('assets/images/admin/books.svg')}}" alt="book icon" />
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
