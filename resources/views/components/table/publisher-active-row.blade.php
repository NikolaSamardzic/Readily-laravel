<tr>
    <td>{{$publisher['name']}}</td>
    <td>{{count($publisher->books)}}</td>
    <td>{{$publisher['created_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('publishers.edit',['id' => $publisher['id']])}}">Change</a></td>
    <td><button class="danger-option" data-id="{{$publisher['id']}}" onclick="deletePublisherRow(this)">Delete</button> </td>
</tr>
