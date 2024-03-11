<tr>
    <td>{{$user['username']}}</td>
    <td>{{$user['email']}}</td>
    <td>{{$user->role['name']}}</td>
    <td>{{$user['created_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('users.edit',['id'=>$user['id']])}}">Change</a></td>
    <td><button class="safe-option" data-id="{{$user['id']}}" onclick="unbanUserRow(this)">Unban</button> </td>
</tr>
