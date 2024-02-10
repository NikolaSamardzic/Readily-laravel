@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
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

    <section id="about-readily">
        <h1>What is Readily?</h1>
        <div id="about-container">
            <p>At Readily, we're passionate about providing you with the books you love. With our online bookstore, you can easily browse and purchase your favorite books, all from the comfort of your own home.</p>

        </div>
        <div id="img-placeholder">
            <img src="{{asset('assets/images/readily.png')}}" class="set-brightness" alt="readily website picture">
        </div>
    </section>

    <div id="angle-down">
        <div id="position"></div>
        <a href="#position">
            <i id="scroll-down" class="fa-solid fa-angle-down"></i>
        </a>

    </div>
    <section id="introduction" class="wrapper">
        <div id="introduction-heading-container">
            <h2>Whatever you're into, we've got <br> something for you</h2>
        </div>

        <article id="article1">
            <img src="{{asset('assets/images/introduction/discover.svg')}}" alt="discover something new image" class="svg" />
            <h3>Discover something new every day</h3>
            <p>At Readily, we're all about discovering something new. With our vast selection of titles and new releases added regularly, there's always something fresh and exciting to explore. Join us today and start your journey of discovery.</p>
        </article>

        <article id="article2">
            <img src="{{asset('assets/images/introduction/originals.svg')}}" alt="minimalistic image for original books" class="svg" />
            <h3>Originals you won't find elsewhere</h3>
            <p>At Readily, we pride ourselves on offering a selection of books that you won't find anywhere else. From rare editions to limited releases, we're passionate about bringing you unique and original titles that will inspire and delight you. Join us today and discover the joy of owning a one-of-a-kind book.</p>
        </article>

        <article id="article3">
            <img src="{{asset('assets/images/introduction/help.svg')}}" alt="helping with chooseing book image" class="svg" />
            <h3>Help finding your next great read</h3>
            <p>At Readily, we're here to help you find your next favorite book. Whether you're looking for a specific genre, author, or just need some inspiration, our knowledgeable staff are on hand to offer recommendations and advice. With our user-friendly website and personalized service, discovering your next great read has never been easier. Join us today and let us help you find your next literary obsession.</p>
        </article>
    </section>

    <section id="discover">
        <img class="svg" id="discover-img-1" src="{{asset('assets/images/introduction/door.svg')}}" alt="descriptive image" />
        <img class="svg" id="discover-img-2" src="{{asset('assets/images/introduction/bed.svg')}}" alt="descriptive image" />

        <div id="discover-container">
            <h2>Read anywhere. Anytime.</h2>
            <p>Discover the best reads on various topics of interest.</p>
            <a href="{{route('home')}}">Explore titles</a>
        </div>
    </section>

    <section id="suggested-books" class="wrapper section-articles">
    </section>

    <x-slider.slider
    idSection="suggested-books"
    idContainer="suggested-books-articles-container"
    classSection="wrapper"
    classContainer="article-book-container"
    >
        @if(0)
        <x-slot name="heading">Books Recommended For You</x-slot>
        @endif
    </x-slider.slider>


    <x-slider.slider
    idSection="bestselling-books"
    idContainer="bestselling-books-articles-container"
    classSection="wrapper"
    classContainer="article-book-container"
    >
        <x-slot name="heading">Bestselling Books</x-slot>


            @for($i=0;$i<20;$i++)
                <article class='article-book'>
                    <div class='bg-article-color-6 article-div-img-container'>
                        <img  class='set-brightness' src='{{asset('assets/images/books/small/51.jpg')}}' alt='Unshakeable: Your Financial Freedom Playbook'>
                    </div>
                    <div class='article-books-text-container'>
                        <div class='title-and-author'>
                            <h3>Unshakeable: Your Financial Freedom Playbook</h3>
                            <a class='author-link' href='#'>Tony Robbins</a>
                        </div>
                        <div class='stars-and-cart-container'>
                            <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-46'></i>
                            <div class='stars-container'>
                                <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-regular fa-star'></i>
                            </div>
                            <p class='rating-text'>4/5</p>
                        </div>
                    </div>
                    <a class='link-to-single-a-book' href='#'>
                    </a>
                </article>
            @endfor

    </x-slider.slider>


    <x-slider.slider
        idSection="popular-categories"
        idContainer="popular-categories-articles-container"
        classSection="wrapper"
        classContainer="article-category-container"
    >
        <x-slot name="heading">Popular Categories</x-slot>

        @for($i=0;$i<20;$i++)
            <article class="article-category">
                <a href="index.php?page=shop&category-id=4"></a>
                <p>Mystery</p>
                <img src="assets/images/books/small/7.jpg" alt="Murder on the Orient Express" class="set-brightness">
            </article>
        @endfor

    </x-slider.slider>

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

<script  src="{{asset('assets/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
@endsection

