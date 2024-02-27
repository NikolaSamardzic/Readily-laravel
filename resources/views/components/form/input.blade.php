@props([
    'for' => '',
    'idLabel' => '',
    'classLabel' => '',
    'label' => '',
    'inputType' => '',
    'inputName' => '',
    'idInput' => '',
    'classInput' => '',
    'idError' => '',
    'error' => '',
    'inputValue' => '',
])


<label for="{{ $for }}" id="{{ $idLabel }}" class="{{ $classLabel }}">{{ $label }}</label>
<input type="{{ $inputType }}" value="{{$inputValue}}" name="{{$inputName}}" id="{{$idInput}}" class="{{$classInput}}" >
<p id="{{ $idError }}" class="error-message" style="display: none;">{{ $error }}</p>
