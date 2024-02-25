<header>
    <div id="header" class="wrapper">
        <a href="{{route('home')}}">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" />
        </a>

        {{ $slot }}

        <div id="icons-container">

            @auth()
                <div>
                    <a href="{{route('users.show',['id'=>auth()->id()])}}">
                        <img src="{{asset('assets/images/avatars')}}/@if(auth()->user()->avatar) {{auth()->user()->avatar['src']}} @else{{'default-avatar.jpg'}}@endif" alt="user avatar">
                    </a>
                </div>
            @endauth

            <i class="fa-solid fa-moon" id="dark-mode-icon" style="display: none;"></i>
            <i class="fa-solid fa-sun" id="light-mode-icon" style="display: block;"></i>
            <i class="fa-solid fa-bars" id="menu-icon-open"></i>
        </div>
    </div>
</header>
