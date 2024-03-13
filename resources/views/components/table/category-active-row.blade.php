<tr>
    <td>{{$category['name']}}</td>
    <td>{{$category->parent ? $category->parent['name'] : '/'}}</td>
    <td>{{count($category->books)}}</td>
    <td>{{$category['created_at']}}</td>
    <td><a class="safe-option change-links" href="{{route('categories.edit',['id' => $category['id']])}}">Change</a></td>
    <td><button class="danger-option" data-id="{{$category['id']}}" onclick="deleteCategoryRow(this)">Delete</button> </td>
</tr>
