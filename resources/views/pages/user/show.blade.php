@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    />

@endsection


@section('header')
    <x-fixed.header>
        <x-fixed.navigation>
            @foreach($data['links'] as $link)
                <x-fixed.navigation-link
                    :href="$link['href']"
                    :name="$link['name']" />
            @endforeach
        </x-fixed.navigation>
    </x-fixed.header>
@endsection

@section('mainContent')
    <x-fixed.phone-navigation>
        @foreach($data['links'] as $link)
            <x-fixed.navigation-link
                :href="$link['href']"
                :name="$link['name']" />
        @endforeach
    </x-fixed.phone-navigation>
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
                <p  class="address-line-input user-information" >Test</p>


                <p id="number-title"  class="input-title">Number</p>
                <p  class="number-input user-information">Test</p>


                <p id="city-title" class="input-title">City</p>
                <p  class="city-input user-information" >Test</p>


                <p id="state-title" class="input-title">State</p>
                <p  class="state-input user-information" >Test</p>


                <p id="zip-code-title" class="input-title ">Zip-code</p>
                <p  class="zip-code-input user-information">Test</p>


                <p id="country-title" class="input-title">Country</p>
                <p class="user-information country-input" >Test</p>
            </div>

            <div class="server-messages success-server-messages">
            </div>

            <div class="button-option-container">
                <form action="{{route('users.destroy',['user'=>$data['user']->id])}}" onsubmit="return deleteUser()" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="danger-option" id="delete-account-button" value="Delete">
                </form>

                <a href="{{route('users.edit',['id'=>$data['user']->id])}}" id="update-account-button" class="safe-option">Update</a>
{{--                <input type="button" class="safe-option" id="update-account-button" value="Update">--}}
            </div>
        </div>
    </section>

@endsection

@section('footer')
    <x-fixed.footer>

        <x-slot name="documentLinks">
            @foreach($data['footer']["documentLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                    :target="$link['target']"
                />
            @endforeach
        </x-slot>

        <x-slot name="socialMediaLinks">
            @foreach($data['footer']["socialMediaLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                    :target="$link['target']"
                />
            @endforeach
        </x-slot>

        <x-slot name="pageLinks">
            @foreach($data['footer']["pageLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                />
            @endforeach
        </x-slot>

    </x-fixed.footer>
@endsection

@section('scripts')
    <x-fixed.scripts></x-fixed.scripts>
@endsection
