@props([
    'tableTitle' => ''
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
        <tbody>
        {{$slot}}
        </tbody>
    </table>
</div>
