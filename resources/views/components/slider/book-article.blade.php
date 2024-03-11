<article class='article-book'>
    <div class='bg-article-color-{{substr($book['id'],-1)}} article-div-img-container'>
        <img  class='set-brightness' src='{{asset('assets/images/books/small')}}/{{$book['image']['src']}}' alt='{{$book['name']}}'>
    </div>
    <div class='article-books-text-container'>
        <div class='title-and-author'>
            <h3>{{$book['name']}}</h3>
            <a class='author-link' href='{{route('user.writer',['user'=>$book['user']['id']])}}'>{{$book['user']['first_name']}} {{$book['user']['last_name']}}</a>

        </div>
        <div class='stars-and-cart-container'>
            <i onclick="addToCart(this)" data-id="{{$book['id']}}" class='fa-solid fa-cart-shopping shopping-cart' ></i>
            <div class='stars-container'>
                @for($i=0;$i<5;$i++)
                    @if($book->reviewStars() > $i)
                        <i class="fa-solid fa-star"></i>
                    @else
                        <i class="fa-regular fa-star"></i>
                    @endif
                @endfor

                    @if(count($book->reviews))
                        <p class="rating-text">{{$book->reviewStars()}}//5 (<span class='text-bold'>{{count($book->reviews)}} ratings</span>)</p>
                    @else
                        <p class="rating-text">no ratings</p>
                    @endif

            </div>
        </div>
        <a class='link-to-single-a-book' href='{{route('book.show',['book'=>$book['id']])}}'></a>
    </div>
</article>
