@props([
    'inputName' => '',
    'inputId' => '',
    'inputClass' => '',
    'idError' => '',
    'error' => '',
])

<input type="file" id="{{$inputId}}" name="{{$inputName}}" class="{{$inputClass}}"/>
<p id="{{ $idError }}" class="error-message" style="display: none;">{{ $error }}</p>
