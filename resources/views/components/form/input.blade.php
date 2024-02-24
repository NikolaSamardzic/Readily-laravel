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
])


<label for="{{ $for }}" id="{{ $idLabel }}" class="{{ $classLabel }}">{{ $label }}</label>
<input type="{{ $inputType }}" value="{{old($inputName)}}" name="{{$inputName}}" id="{{$idInput}}" class="{{$classInput}}" >
<p id="{{ $idError }}" class="error-message" style="display: none;">{{ $error }}</p>
