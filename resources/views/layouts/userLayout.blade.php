@extends('layouts.baseLayout')

@section('content')

    <x-fixed.header>
        <x-fixed.navigation>

            @foreach($headerLinks as $link)
                <x-fixed.navigation-link :link="$link"/>
            @endforeach
        </x-fixed.navigation>
    </x-fixed.header>

    <x-fixed.phone-navigation>
        @foreach($headerLinks as $link)
            <x-fixed.navigation-link :link="$link"/>
        @endforeach
    </x-fixed.phone-navigation>

    @yield('mainContent')


    <x-fixed.footer>

        <x-slot name="documentLinks">
            @foreach($footerLinks["documentLinks"] as $link)
                <x-fixed.footer-link :link="$link" />
            @endforeach
        </x-slot>

        <x-slot name="socialMediaLinks">
            @foreach($footerLinks["socialMediaLinks"] as $link)
                <x-fixed.footer-link :link="$link" />
            @endforeach
        </x-slot>

        <x-slot name="pageLinks">
            @foreach($footerLinks["pageLinks"] as $link)
                <x-fixed.footer-link :link="$link" />
            @endforeach
        </x-slot>

        @yield('footer')
    </x-fixed.footer>

@endsection
