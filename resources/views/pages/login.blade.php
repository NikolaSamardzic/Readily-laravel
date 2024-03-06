@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Login"
    />

@endsection

@section('mainContent')

    <section id="log-in-section">
        <form name="login-form" id="login-form" action="{{route('login.submit')}}" onsubmit="return sendLoginData()" method="POST">
            @csrf
            <h2>LOG IN</h2>

            <div id="log-in-container">
                <x-form.input
                    for="username-input-js"
                    idLabel="username-title"
                    classLabel="input-title"
                    label="Username"
                    inputType="text"
                    inputName="username-input"
                    idInput="username-input-js"
                    idError="username-error"
                    error="Incorrect format"
                />

                <x-form.input
                    for="password-input-js"
                    idLabel="password-title"
                    classLabel="input-title"
                    label="Password"
                    inputType="password"
                    inputName="password-input"
                    idInput="password-input-js"
                    idError="password-error"
                    error="Incorrect format"
                />

            </div>

            <div class="server-messages">
                @if (session('error-msg'))
                    <p class="error-message">{{ session('error-msg') }}</p>
                @endif
            </div>

            <input type="submit" value="Submit" id="log-in-button">

        </form>
    </section>
@endsection
