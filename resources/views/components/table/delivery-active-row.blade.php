<tr>
    <td>{{$delivery['name']}}</td>
    <td>{{count($delivery->orders)}}</td>
    <td>{{$delivery['created_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('delivery.edit',['id' => $delivery['id']])}}">Change</a></td>
    <td><button class="danger-option" data-id="{{$delivery['id']}}" onclick="deleteDeliveryRow(this)">Delete</button> </td>
</tr>
