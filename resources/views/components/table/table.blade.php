@props([
    'tableTitle' => '',
    'tableBodyId' => '',
    'tableClass' => "",
    'tableId' => ""
])

<h2>{{$tableTitle}}</h2>

<div class="{{$tableClass}}" id="{{$tableId}}">
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
