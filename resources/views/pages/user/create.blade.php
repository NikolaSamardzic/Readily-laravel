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
    <form class="sign-up-container" id="sign-up-form" enctype="multipart/form-data" name="signup-form" action="{{route('users.create')}}" method="post">

        <h2>Personal info</h2>

        <div id="user-avatar-placeholder-js" class="user-avatar-placeholder">
            <img src="{{asset('assets/images/avatars/default-avatar.jpg')}}" id="user-avatar-img" alt="user avatar">
        </div>
        <p class="upload-avatar-text">upload avatar</p>

        <input type="file" id="user-avatar-js" name="user-avatar" class="user-avatar"/>
        <p  id="avatar-error"  class="error-message " style="display:none">Please upload an image with a maximum size of 700KB and in one of the following formats: jpg, jpeg, or png for your avatar.</p>

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
            />

            <x-form.input
                for="last-name-input-js"
                idLabel="last-name-title"
                classLabel="input-title"
                label="Last Name"
                inputType="text"
                inputName="last-name-input"
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
                idInput="phone-input-js"
                classInput="phone-input"
                idError="phone-error"
                error="Incorrect format (ex. 0611234567)"
            />


            <label for="role-input-js"  class="input-title role-title">Role</label>
            <select id="role-input-js" name="role-input" class="role-input">
                <option value="2" selected>Customer</option>
                <option value="3">Writer</option>
            </select>
            <p id="role-error"  class="error-message " style="display: none;">Role doesn't exist</p>

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
                idInput="country-input-js"
                classInput="country-input"
                idError="country-error"
                error="Incorrect format (ex.  United States)"
            />


        </div>

        <div class="server-messages">
        </div>

        <input type="button" id="create-account-button" value="Create Account">

    </form>

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
