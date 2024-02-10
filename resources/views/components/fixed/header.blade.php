<header>
    <div id="header" class="wrapper">
        <a href="{{route('home')}}">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" />
        </a>

        {{ $slot }}

        <div id="icons-container">


            <i class="fa-solid fa-moon" id="dark-mode-icon" style="display: none;"></i>
            <i class="fa-solid fa-sun" id="light-mode-icon" style="display: block;"></i>
            <i class="fa-solid fa-bars" id="menu-icon-open"></i>
        </div>
    </div>
</header>
