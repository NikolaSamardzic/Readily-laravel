<tr>
    <td class="td-image">
        <img class="set-brightness" src="{{asset('assets/images/books/small')}}/{{$item->book->image['src']}}" alt="{{$item->book->image['alt']}}">
    </td>
    <td class="td-title">
        <div>
            <p>{{$item->book['name']}}</p>
        </div>
    </td>
    <td class="td-unit-price">
        <p>${{$item->book['price']}}</p>
    </td>
    <td class="td-quantity">
        <div>
            <input min="1" data-book-order-id="{{$item->book['id']}}" onchange="updateCart(this)" type="number" value="{{$item['quantity']}}">
        </div>
    </td>
    <td class="td-price">
        <p id="price-107">${{$item['quantity'] * $item['unit_price']}}
    </td>
    <td class="td-remove">
        <div>
            <i class="fa-solid fa-xmark" data-book-order-id="{{$item->book['id']}}" onclick="removeCheckoutRow(this)">
            </i>
        </div>
    </td>
</tr>
