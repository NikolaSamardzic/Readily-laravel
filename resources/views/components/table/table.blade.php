@props([
    'tableTitle' => '',
    'tableBodyId' => ''
])

<h2>{{$tableTitle}}</h2>

<div class="table-container">
    <table id="X">
        <thead>
        <tr>
            @foreach($columnTitles as $columnTitle)
                <th>{{$columnTitle}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody id="{{$tableBodyId}}">
        {{$slot}}
        </tbody>
    </table>
</div>
