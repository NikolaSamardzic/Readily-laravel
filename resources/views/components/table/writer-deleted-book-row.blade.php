<tr>
    <td class="td-image"><img src="{{asset('assets/images/books/small')}}/{{$book->image['src']}}" alt="{{$book['alt']}}"></td>
    <td>{{$book['name']}}</td>
    <td>${{$book['price']}}</td>
    <td>{{$book['deleted_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('books.edit', ['user'=>$user, 'book'=>$book])}}">Change</a></td>
    <td><button class="safe-option" data-id="{{$book['id']}}" onclick="activateBookRow(this)">Activate</button> </td>
</tr>
