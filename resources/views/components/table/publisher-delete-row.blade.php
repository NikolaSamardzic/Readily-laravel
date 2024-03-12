<tr>
    <td>{{$publisher['name']}}</td>
    <td>{{count($publisher->books)}}</td>
    <td>{{$publisher['deleted_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('publishers.edit',['id'=>$publisher['id']])}}">Change</a></td>
    <td><button class="safe-option" data-id="{{$publisher['id']}}" onclick="activatePublisherRow(this)">Activate</button> </td>
</tr>
