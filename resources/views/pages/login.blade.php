@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Login"
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
