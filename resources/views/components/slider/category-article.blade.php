<article class="article-category">
    <a href="{{route('shop.index',['book-category[]'=>\App\Models\Category::childrenIds($category['category_id'])])}}"></a>
    <p>{{$category['category_name']}}</p>
    <img src="{{asset('assets/images/books/small/' . $category['src'])}}" alt="{{$category['category_name']}}" class="set-brightness">
</article>
