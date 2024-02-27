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
])


<label for="{{ $for }}" id="{{ $idLabel }}" class="input-title" @if(old('role-input')!=3) style="display:none;"  @endif>{{ $label }}</label>
<textarea name="{{$textAreaName}}" id="{{$textAreaId}}" class="{{$textAreaClass}}" @if(old('role-input')!=3) style="display:none;"  @endif ></textarea>
<p id="{{ $idError }}" class="error-message" style="display: none;">{{ $error }}</p>

