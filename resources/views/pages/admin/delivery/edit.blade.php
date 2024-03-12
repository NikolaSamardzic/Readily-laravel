@extends('layouts.adminLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')


    <form class="insert-update-row-form" id="delivery-type-form" action="{{route('delivery.update',['id'=>$delivery['id']])}}"  onsubmit="checkDelivery()" method="POST">
        @csrf
        @method('put')
        <label for="delivery-type-name">Name</label>
        <input type="text" value="{{$delivery['name']}}" id="delivery-type-name" name="delivery-type-name">
        <p id="delivery-type-name-error" class="error-message" style="display: none;">Incorrect format</p>
        <div class="button-option-container">
            <a class="danger-option" href="{{route('delivery.index')}}">Cancel</a>
            <input type="submit" class="safe-option" id="save-button" value="Save">
        </div>

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li><p class="error-message">{{ $error }}</p></li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success-msg'))
            <p class="success-message">
                {{ session('success-msg') }}
            </p>
        @endif
    </form>



@endsection
