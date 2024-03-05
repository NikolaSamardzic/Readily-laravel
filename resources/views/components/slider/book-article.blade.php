<article class='article-book'>
    <div class='bg-article-color-".$lastDigit." article-div-img-container'>
        <img  class='set-brightness' src='{{asset('assets/images/books/small')}}/{{$src}}' alt='{{$title}}'>
    </div>
    <div class='article-books-text-container'>
        <div class='title-and-author'>
            <h3>{{$title}}</h3>
            <a class='author-link' href='#{{$idWriter}}'>{{$writer}}</a>
        </div>
        <div class='stars-and-cart-container'>
            <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-{{$id}}'></i>
            <div class='stars-container'>
                @for($i=0;$i<5;$i++)
                    @if(intval($review)>$i)
                        <i class='fa-solid fa-star'></i>
                    @else
                        <i class='fa-regular fa-star'></i>
                    @endif
                @endfor

            </div>
        </div>
        <a class='link-to-single-a-book' href='#{{$id}}'>
        </a>
    </div>
</article>
