@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    />

@endsection

@section('mainContent')


    <section id="book-info" class="wrapper">
        <h1>{{$data['book']['name']}}</h1>
        <p id="writer-link">By <a href="{{route('user.writer',['user'=>$data['book']->user['id']])}}">{{$data['book']->user['first_name']}} {{$data['book']->user['last_name']}}</a></p>
        <div id="stars">

            @for($i=0;$i<5;$i++)
                @if($data['book']->reviewStars() > $i)
                    <i class="fa-solid fa-star"></i>
                @else
                    <i class="fa-regular fa-star"></i>
                @endif
            @endfor

            @if(count($data['book']->reviews))
                <p>{{$data['book']->reviewStars()}}//5 (<span class='text-bold'>{{count($data['book']->reviews)}} ratings</span>)</p>
            @else
                <p>no ratings</p>
            @endif

        </div>

        <div id="text-container-about">
            <h2>About this book</h2>
            <p style="white-space: pre-wrap;">{{$data['book']['description']}}</p>
        </div>




        <x-slider.slider
            idSection="related-categories-container"
            idContainer="book-related-categories-section"
            classContainer="article-category-container"
        >
            <x-slot name="heading">Related Categories</x-slot>
            @foreach($data['relatedCategories'] as $category)
                <x-slider.category-article :category="$category" />
            @endforeach
        </x-slider.slider>

        <div class="section-articles" id="div-info-section">
            <h2 class="section-heading">Info</h2>
            <div class="article-container article-info-container" id="div-info-container">
                <article>
                    <p class="heading-info">Pages</p>
                    <p class="text-bold">{{$data['book']['page_count']}}</p>
                </article>
                <article>
                    <p class="heading-info">Publisher</p>
                    <p class="text-bold">{{$data['book']->publisher['name']}}</p>
                </article>
                <article>
                    <p class="heading-info">Release Date</p>
                    <p class="text-bold">{{date('F j, Y', strtotime($data['book']['release_date']))}}</p>
                </article>
            </div>
        </div>

        <div id="container-div-image-and-price">
            <div id="container-div-img" class="bg-article-color-{{substr($data['book']['id'],-1)}}">
                <img class="set-brightness" src="{{asset('assets/images/books/large')}}/{{$data['book']->image['src']}}" alt="{{$data['book']->image['alt']}}">
            </div>
            <div id="price-container">
                <p>${{$data['book']['price']}}</p>
                <i onclick="addToCart(this)" data-id="{{$data['book']['id']}}" class="fa-solid fa-cart-shopping"></i>
            </div>
        </div>

    </section>

    <x-slider.slider
        idSection="related-books"
        idContainer="related-books-articles-container"
        classSection="wrapper"
        classContainer="article-book-container"
    >
        <x-slot name="heading">Related to {{$data['book']['name']}}</x-slot>
        @foreach($data['relatedBooks'] as $book)
            <x-slider.book-article :book="$book"/>
        @endforeach
    </x-slider.slider>


    <x-slider.slider
        idSection="authors-books"
        idContainer="autors-books-articles-container"
        classSection="wrapper"
        classContainer="article-book-container"
    >
        <x-slot name="heading">Read more from {{$data['book']->user['first_name']}} {{$data['book']->user['last_name']}}</x-slot>
        @foreach($data['writesBooks'] as $book)
            <x-slider.book-article :book="$book"/>
        @endforeach
    </x-slider.slider>


    <section id="review-section" class="wrapper">
        <div id="review-container">
            <h2>Reviews for {{$data['book']['name']}}</h2>
            <div id="review-stars-container">


                @for($i=0;$i<5;$i++)
                    @if($book->reviewStars() > $i)
                        <i class="fa-solid fa-star"></i>
                    @else
                        <i class="fa-regular fa-star"></i>
                    @endif
                @endfor
                @if(count($data['book']->reviews))
                    <p>{{$data['book']->reviewStars()}}/5</p>
                @endif
            </div>
            <div id="review-info">
                <p>{{count($data['book']->reviews)}} ratings</p>
                <p>0 reviews</p>
            </div>
        </div>



    @auth()
        <form id="star-rating-form" class="wrapper">

            <h2>Rate this Book</h2>

            <div class="star-raiting-container">

                @for($i=0;$i<5;$i++)
                    @for($i=0;$i<5;$i++)
                        <div class='star-icon-container'>
                            <i  class="fa-star book-rating-star @if($data['book']->reviewStars() > $i){{'fa-solid'}} @else {{'fa-regular'}}@endif"></i>
                            <input type='radio' value='{{$i}}' hidden name='book-stars' />
                        </div>
                    @endfor
                @endfor

            </div>

            <div class="server-messages" style="display:none">
            </div>

        </form>


        <form class="sign-up-container" id="form-comment" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden name="book-id" value="{{$data['book']['id']}}">
            <h2>Write a Review</h2>

            <div class="info-container-grid personal-info-container-grid" id="comment-container">

                <x-form.text-area
                    for="biography-input"
                    idLabel="biography-title"
                    classLabel="biography-title"
                    label="Comment"
                    textAreaName="comment-input"
                    textAreaId="biography-input"
                    textAreaClass="biography-input"
                    idError="biography-error"
                    error="There must be at least 5 words."
                    displayed="1"
                    textValue="{{old('book-description-input')}}"
                />

            </div>

            <p class="p-title">Images</p>
            <div id="comment-images-container">
                <input type="file" class="comment-image" name="comment-image[]">
            </div>
            <p id="comment-images-error" class="error-message " style="display: none;" >Supported image formats include JPG, JPEG, and PNG, with a total file size limit of 2MB for all images combined.</p>


            <input type="text" hidden name="book-id" value="{{$data['book']['id']}}">

            <div class="server-messages comment-server-error"  style="display:none"></div>

            <div class="button-option-container">
                <input type="button" class="safe-option" id="comment-button" value="Submit">
            </div>
        </form>

    @endauth

</section>
@endsection
