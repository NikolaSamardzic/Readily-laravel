@props([
    'for' => '',
    'idLabel' => '',
    'classLabel' => '',
    'label' => '',
    'inputType' => '',
    'inputName' => '',
    'idInput' => '',
    'idError' => '',
    'error' => '',
])


<label for="{{ $for }}" id="{{ $idLabel }}" class="{{ $classLabel }}">{{ $label }}</label>
<input type="{{ $inputType }}" name="{{$inputName}}" id="{{$idInput}}" >
<p id="{{ $idError }}" class="error-message" style="display: none;">{{ $error }}</p>
