@extends('layouts.adminLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')


    <form class="insert-update-row-form" id="delivery-type-form" action="{{route('delivery.store')}}"  onsubmit="checkDelivery()" method="POST">
        @csrf
        <label for="delivery-type-name">Name</label>
        <input type="text" id="delivery-type-name" name="delivery-type-name">
        <p id="delivery-type-name-error" class="error-message" style="display: none;">Incorrect format</p>
        <div class="button-option-container">
            <a class="danger-option" href="{{route('delivery.index')}}">Cancel</a>
            <input type="submit" class="safe-option" id="save-button" value="Save">
        </div>

        @if(session('error'))
            <div>
                <ul>
                    <li><p class="error-message">{{ session('error') }}</p></li>
                </ul>
            </div>
        @endif

        @if(session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif
    </form>



@endsection
