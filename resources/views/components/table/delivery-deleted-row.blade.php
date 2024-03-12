<tr>
    <td>{{$delivery['name']}}</td>
    <td>{{count($delivery->orders)}}</td>
    <td>{{$delivery['deleted_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('delivery.edit',['id'=>$delivery['id']])}}">Change</a></td>
    <td><button class="safe-option" data-id="{{$delivery['id']}}" onclick="activateDeliveryRow(this)">Activate</button> </td>
</tr>
