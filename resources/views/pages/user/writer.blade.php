@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    />

@endsection

@section('mainContent')
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
            <x-slider.book-article :book="$book"/>
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
            <x-slider.category-article :category="$category" />
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
