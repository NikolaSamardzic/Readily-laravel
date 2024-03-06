@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    />

@endsection

@section('mainContent')

    <form class="sign-up-container" id="sign-up-form" enctype="multipart/form-data" name="signup-form" action="{{route('users.store')}}" onsubmit="return sendSignupData()" method="post">
        @csrf
        <h2>Personal info</h2>

        <div id="user-avatar-placeholder-js" class="user-avatar-placeholder">
            <img src="{{asset('assets/images/avatars/default-avatar.jpg')}}" id="user-avatar-img" alt="user avatar">
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
                inputValue="{{old('first-name-input')}}"
            />

            <x-form.input
                for="last-name-input-js"
                idLabel="last-name-title"
                classLabel="input-title"
                label="Last Name"
                inputType="text"
                inputName="last-name-input"
                inputValue="{{old('last-name-input')}}"
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
                inputValue="{{old('username-input')}}"
                idInput="username-input-js"
                classInput="username-input"
                idError="username-error"
                error="Your username must be at least 5 characters long and can only contain letters, numbers, periods, parentheses, forward slashes, hyphens, and underscores."
            />

            <x-form.input
                for="password-input-js"
                idLabel="password-title"
                classLabel="input-title"
                label="Password"
                inputType="password"
                inputName="password-input"
                inputValue="{{old('password-input')}}"
                idInput="password-input-js"
                classInput="password-input"
                idError="password-error"
                error="Your password must be at least 5 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character from the set of periods, parentheses, forward slashes, hyphens, and underscores (' . ',  '_', '-',  '/', '()')."
            />

            <x-form.input
                for="email-input-js"
                idLabel="email-title"
                classLabel="input-title"
                label="Email"
                inputType="email"
                inputName="email-input"
                inputValue="{{old('email-input')}}"
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
                inputValue="{{old('phone-input')}}"
                idInput="phone-input-js"
                classInput="phone-input"
                idError="phone-error"
                error="Incorrect format (ex. 0611234567)"
            />

            <x-form.select
                for="role-input-js"
                idLabel="role-title"
                classLabel="input-title"
                label="Role"
                selectName="role-input"
                selectId="role-input-js"
                selectClass="role-input"
                idError="role-error"
                error="Role doesn't exist"
            >
                <option value="2" @if(old('role-input')==2){{'selected'}}@endif>Customer</option>
                <option value="3" @if(old('role-input')==3){{'selected'}}@endif>Writer</option>
            </x-form.select>


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
                textValue="{{old('biography-input')}}"
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
                inputValue="{{old('address-line-input')}}"
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
                inputValue="{{old('number-input')}}"
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
                inputValue="{{old('city-input')}}"
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
                inputValue="{{old('state-input')}}"
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
                inputValue="{{old('zip-code-input')}}"
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
                inputValue="{{old('country-input')}}"
                idInput="country-input-js"
                classInput="country-input"
                idError="country-error"
                error="Incorrect format (ex.  United States)"
            />


        </div>

        <div class="server-messages">
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

        <input type="submit" id="create-account-button" value="Create Account">

    </form>

@endsection
