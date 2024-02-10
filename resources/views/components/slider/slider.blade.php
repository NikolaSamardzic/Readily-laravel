@props([
    'idSection' => '',
    'idContainer' => '',
    'classSection' => '',
    'classContainer' => ''
])

<section id="{{ $idSection }}" class="section-articles {{ $classSection }}">
    <h2 class="section-heading" >{{ $heading ?? '' }}</h2>

    <div class="article-container {{ $classContainer }}" id="{{ $idContainer }}">{{ $slot }}</div>
</section>
