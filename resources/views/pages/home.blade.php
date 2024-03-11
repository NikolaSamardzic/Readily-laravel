@extends('layouts.userLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')
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
            <img src="{{asset('assets/images/introduction/help.svg')}}" alt="helping with choosing book image" class="svg" />
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

    <x-slider.slider
    idSection="suggested-books"
    idContainer="suggested-books-articles-container"
    classSection="wrapper"
    classContainer="article-book-container"
    >
        @if(isset($data['preferedCategoriesBooks']))
        <x-slot name="heading">Books Recommended For You</x-slot>
            @foreach($data['preferedCategoriesBooks'] as $book)
                <x-slider.book-article :book="$book" />
            @endforeach
        @endif
    </x-slider.slider>


    <x-slider.slider
    idSection="bestselling-books"
    idContainer="bestselling-books-articles-container"
    classSection="wrapper"
    classContainer="article-book-container"
    >
        <x-slot name="heading">Bestselling Books</x-slot>
        @foreach($data['bestSellingBooks'] as $book)
            <x-slider.book-article :book="$book" />
        @endforeach
    </x-slider.slider>


    <x-slider.slider
        idSection="popular-categories"
        idContainer="popular-categories-articles-container"
        classSection="wrapper"
        classContainer="article-category-container"
    >
        <x-slot name="heading">Popular Categories</x-slot>
        @foreach($data['categories'] as $category)
            <x-slider.category-article :category="$category" />
        @endforeach
    </x-slider.slider>

    @auth()
        <form class="sign-up-container" id="message-form" >

            <h2>Get in Touch with Us</h2>

            <div class="info-container-grid personal-info-container-grid">

                <x-form.input
                    for="subject-input-js"
                    idLabel="first-name-title"
                    classLabel="input-title"
                    label="Subject"
                    inputType="text"
                    inputName="subject"
                    idInput="subject-input-js"
                    classInput="first-name-input"
                    idError="first-name-error"
                    error="Can't be empty"
                />

                <x-form.text-area
                    for="biography-input"
                    idLabel="biography-title"
                    classLabel="biography-title"
                    label="Message"
                    textAreaName="text"
                    textAreaId="biography-input"
                    textAreaClass="biography-input"
                    idError="biography-error"
                    error="There must be at least 5 words."
                    displayed="1"
                />

            </div>

            <div class="server-messages" style="display:none">
            </div>

            <div class="button-option-container">
                <input type="button" class="safe-option" id="send-message-form" value="Send">
            </div>
        </form>
    @endauth


@endsection
