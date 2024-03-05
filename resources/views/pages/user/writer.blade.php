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

    <section id="writer-info">
        <div id="writer-info-container" class="wrapper">
            <h1>{{$data['writer']['first_name']}} {{$data['writer']['last_name']}}</h1>
            <img alt="J.K. Rowling" src="{{asset('assets/images/avatars')}}/{{$data['writer']['avatar']['src']}}">
            <p class="short-info" style="display: block;">{{$data['shortBiography']}}<span id="show-more">Show More</span></p><p class="long-info" style="display: none;">{{$data['writer']['biography']['biography_text']}}<span id="show-less">Show Less</span></p></div>
    </section>


    <x-slider.slider
        idSection="writer-books"
        idContainer="writer-books-articles-container"
        classSection="wrapper"
        classContainer="article-book-container"
    >
        <x-slot name="heading">Books by {{$data['writer']['first_name']}} {{$data['writer']['last_name']}}</x-slot>

        @foreach($data['books'] as $book)
            <x-slider.book-article
                :id="$book['id']"
                :src="$book['image']['src']"
                :title="$book['name']"
                :idWriter="$book['user_id']"
                :writer="$data['writer']['first_name']"
                :review="'3'"
            />
        @endforeach

    </x-slider.slider>

    <x-slider.slider
        idSection="writer-categories"
        idContainer="writer-categories-articles-container"
        classSection="wrapper"
        classContainer="article-category-container"
    >
        <x-slot name="heading">Related Categories</x-slot>

        @foreach($data['relatedCategories'] as $category)
            <x-slider.category-article
                :id="$category['id']"
                :src="'12.jpg'"
                :title="$category['name']"
            />
        @endforeach

    </x-slider.slider>


    <x-slider.slider
        idSection="other-writers"
        idContainer="other-writers-articles-container"
        classSection="wrapper"
        classContainer="article-author-container"
    >
        <x-slot name="heading">Check Out Other Authors</x-slot>

        @foreach($data['writers'] as $writer)
            <x-slider.writer-article :writer="$writer"></x-slider.writer-article>
        @endforeach

    </x-slider.slider>

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
