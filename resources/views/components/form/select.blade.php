@props([
    'for' => '',
    'idLabel' => '',
    'classLabel' => '',
    'label' => '',
    'selectName' => '',
    'selectId' => '',
    'selectClass' => '',
    'idError' => '',
    'error' => '',
])


<label for="{{ $for }}" id="{{ $idLabel }}" class="input-title {{$classLabel}}" >{{ $label }}</label>
<select name="{{$selectName}}" id="{{$selectId}}" class="{{$selectClass}}"  >{{$slot}}</select>
<p id="{{ $idError }}" class="error-message" style="display: none;">{{ $error }}</p>
