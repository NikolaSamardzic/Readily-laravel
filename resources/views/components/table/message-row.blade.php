<tr>
<td>{{$message->user['username']}}</td>
<td>{{$message->user['email']}}</td>
<td>{{$message['created_at']}}</td>
<td>{{$message['subject']}}</td>
<td  class="td-text">{{$message['text']}}</td>
<td><button class="danger-option" data-id="{{$message['id']}}" onclick="deleteMessageRow(this)">Delete</button> </td>
</tr>
