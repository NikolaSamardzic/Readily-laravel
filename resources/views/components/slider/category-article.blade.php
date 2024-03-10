<article class="article-category">
    <a href="{{route('shop.index',['book-category[]'=>$category->childrenIds()])}}"></a>
    <p>{{$category['name']}}</p>
    <img src="{{asset('assets/images/books/small/' . $category['src'])}}" alt="{{$category['name']}}" class="set-brightness">
</article>
