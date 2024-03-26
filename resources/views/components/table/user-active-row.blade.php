<tr>
    <td>{{$user['username']}}</td>
    <td>{{$user['email']}}</td>
    <td>{{$user->role['name']}}</td>
    <td>{{$user['created_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('users.edit',['user'=>$user['id']])}}">Change</a></td>
    <td><button class="danger-option" data-id="{{$user['id']}}" onclick="banUserRow(this)">Ban</button> </td>
    <td><button class="danger-option" data-id="{{$user['id']}}" onclick="deleteUserRow(this)">Delete</button> </td>
</tr>
