@props([
    'for' => '',
    'idLabel' => '',
    'classLabel' => '',
    'label' => '',
    'textAreaName' => '',
    'textAreaId' => '',
    'textAreaClass' => '',
    'idError' => '',
    'displayed' => 0,
    'error' => '',
    'textValue' => '',
])

<label for="{{ $for }}" id="{{ $idLabel }}" class="input-title" @if(!$displayBiography && (old('role-input')!=3 && $displayed == 0)) style="display:none;"  @endif>{{ $label }}</label>
<textarea name="{{$textAreaName}}" id="{{$textAreaId}}" class="{{$textAreaClass}}" @if(!$displayBiography && (old('role-input')!=3 && $displayed == 0)) style="display:none;"  @endif >{{$textValue}}</textarea>
<p id="{{ $idError }}" class="error-message" style="display: none;">{{ $error }}</p>

