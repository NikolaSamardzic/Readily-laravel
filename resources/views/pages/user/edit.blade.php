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
            @foreach($headerLinks as $link)
                <x-fixed.navigation-link
                    :href="$link['href']"
                    :name="$link['name']" />
            @endforeach
        </x-fixed.navigation>
    </x-fixed.header>
@endsection

@section('mainContent')
    <x-fixed.phone-navigation>
        @foreach($headerLinks as $link)
            <x-fixed.navigation-link
                :href="$link['href']"
                :name="$link['name']" />
        @endforeach
    </x-fixed.phone-navigation>


<section id="user-profile-section">
    <form onsubmit="return saveUpdatedUserData()"  class="sign-up-container" id="update-user-form" enctype="multipart/form-data" name="signup-form" action="{{route('users.update',['user' => $data['user']])}}" method="post" >
    @csrf
    @method('PUT')

        <input type="text" name="user-id" value="{{$data['user']['id']}}" hidden/>
        <input type="text" name="user-role" id="role-input" value="{{$data['user']['role_id']}}" hidden/>

        <h2>Personal info</h2>

        <div id="user-avatar-placeholder-js" class="user-avatar-placeholder">
            <img src="{{asset('assets/images/avatars')}}/@if(isset($data['user']->avatar['src'])){{$data['user']->avatar['src']}}@else{{'default-avatar.jpg'}}@endif" id="user-avatar-img" alt="user avatar">
        </div>
        <p class="upload-avatar-text">upload avatar</p>

        <x-form.file-upload
            inputName="user-avatar"
            inputId="user-avatar-js"
            inputClass="user-avatar"
            idError="avatar-error"
            error="Please upload an image with a maximum size of 700KB and in one of the following formats: jpg or png for your avatar."
        />


        <div class="info-container-grid personal-info-container-grid">

            <x-form.input
                for="first-name-input-js"
                idLabel="first-name-title"
                classLabel="input-title"
                label="First Name"
                inputType="text"
                inputName="first-name-input"
                idInput="first-name-input-js"
                classInput="first-name-input"
                idError="first-name-error"
                error="Incorrect format (ex. Joe)"
                inputValue="{{old('first-name-input') != null ? old('first-name-input') : $data['user']['first_name']}}"
            />

            <x-form.input
                for="last-name-input-js"
                idLabel="last-name-title"
                classLabel="input-title"
                label="Last Name"
                inputType="text"
                inputName="last-name-input"
                inputValue="{{old('last-name-input') != null ? old('last-name-input') : $data['user']['last_name']}}"
                idInput="last-name-input-js"
                classInput="last-name-input"
                idError="last-name-error"
                error="Incorrect format (ex. Smith)"
            />



            <x-form.input
                for="username-input-js"
                idLabel="username-title"
                classLabel="input-title"
                label="Username"
                inputType="text"
                inputName="username-input"
                inputValue="{{old('username-input') != null ? old('username-input') : $data['user']['username']}}"
                idInput="username-input-js"
                classInput="username-input"
                idError="username-error"
                error="Your username must be at least 5 characters long and can only contain letters, numbers, periods, parentheses, forward slashes, hyphens, and underscores."
            />

            <x-form.input
                for="email-input-js"
                idLabel="email-title"
                classLabel="input-title"
                label="Email"
                inputType="email"
                inputName="email-input"
                inputValue="{{old('email-input') != null ? old('email-input') : $data['user']['email']}}"
                idInput="email-input-js"
                classInput="email-input"
                idError="email-error"
                error="Incorrect format (ex. jhonsmith@gmail.com)"
            />

            <x-form.input
                for="phone-input-js"
                idLabel="phone-title"
                classLabel="input-title"
                label="Phone"
                inputType="number"
                inputName="phone-input"
                inputValue="{{old('phone-input') != null ? old('phone-input') : $data['user']['phone']}}"
                idInput="phone-input-js"
                classInput="phone-input"
                idError="phone-error"
                error="Incorrect format (ex. 0611234567)"
            />

            <p id="role-title" class="input-title ">Role</p>
            <p id="role-input-js"  class="role-input user-information">{{ucfirst($data['user']->role['name'])}}</p>

            <x-form.text-area
                for="biography-input"
                idLabel="biography-title"
                classLabel="biography-title"
                label="Biography"
                textAreaName="biography-input"
                textAreaId="biography-input"
                textAreaClass="biography-input"
                idError="biography-error"
                error="There must be at least 5 words."
                textValue="{{old('biography-input') != null ? old('biography-input') : $data['biography']}}"
            />
        </div>

        <h2>Address info <br /><span>(optional)</span></h2>

        <div  class="info-container-grid address-info-container-grid">

            <x-form.input
                for="address-line-input-js"
                idLabel="address-line-title"
                classLabel="input-title"
                label="Address line"
                inputType="text"
                inputName="address-line-input"
                inputValue="{{old('address-line-input') != null ? old('address-line-input') : $data['addressInformation']['address_name']}}"
                idInput="address-line-input-js"
                classInput="address-line-input"
                idError="address-line-error"
                error="Please enter a valid address line."
            />

            <x-form.input
                for="number-input-js"
                idLabel="number-title"
                classLabel="input-title"
                label="Number"
                inputType="text"
                inputName="number-input"
                inputValue="{{old('number-input') != null ? old('address-number-input') : $data['addressInformation']['address_number']}}"
                idInput="number-input-js"
                classInput="number-input"
                idError="number-error"
                error="Please enter a valid address number."
            />

            <x-form.input
                for="city-input-js"
                idLabel="city-title"
                classLabel="input-title"
                label="City"
                inputType="text"
                inputName="city-input"
                inputValue="{{old('city-input') != null ? old('city-input') : $data['addressInformation']['city']}}"
                idInput="city-input-js"
                classInput="city-input"
                idError="city-error"
                error="Incorrect format (ex.  Los Angeles)"
            />

            <x-form.input
                for="state-input-js"
                idLabel="state-title"
                classLabel="input-title"
                label="State"
                inputType="text"
                inputName="state-input"
                inputValue="{{old('state-input') != null ? old('state-input') : $data['addressInformation']['state']}}"
                idInput="state-input-js"
                classInput="state-input"
                idError="state-error"
                error="Incorrect format (ex.  California)"
            />

            <x-form.input
                for="zip-code-input-js"
                idLabel="zip-code-title"
                classLabel="input-title"
                label="Zip-code"
                inputType="text"
                inputName="zip-code-input"
                inputValue="{{old('zip-code-input') != null ? old('zip-code-input') : $data['addressInformation']['zip_code']}}"
                idInput="zip-code-input-js"
                classInput="zip-code-input"
                idError="zip-code-error"
                error="Incorrect format (ex.  90001)"
            />

            <x-form.input
                for="country-input-js"
                idLabel="country-title"
                classLabel="input-title"
                label="Country"
                inputType="text"
                inputName="country-input"
                inputValue="{{old('country-input') != null ? old('country-input') : $data['addressInformation']['country']}}"
                idInput="country-input-js"
                classInput="country-input"
                idError="country-error"
                error="Incorrect format (ex.  United States)"
            />
        </div>

        <div class="server-messages error-server-messages">
            @if($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><p class="error-message">{{ $error }}</p></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success-msg'))
                <p class="success-message">
                    {{ session('success-msg') }}
                </p>
            @endif
        </div>

        <div class="button-option-container">
            <a href="{{url()->previous()}}" class="danger-option" id="cancel-account-button">Cancel</a>
            <input type="submit" class="safe-option" id="save-account-button" value="Save">
        </div>

    </form>
</section>

@endsection

@section('footer')
    <x-fixed.footer>

        <x-slot name="documentLinks">
            @foreach($footerLinks["documentLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                    :target="$link['target']"
                />
            @endforeach
        </x-slot>

        <x-slot name="socialMediaLinks">
            @foreach($footerLinks["socialMediaLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                    :target="$link['target']"
                />
            @endforeach
        </x-slot>

        <x-slot name="pageLinks">
            @foreach($footerLinks["pageLinks"] as $link)
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
