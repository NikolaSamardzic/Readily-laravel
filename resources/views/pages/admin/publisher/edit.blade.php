@extends('layouts.adminLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')


    <form class="insert-update-row-form" id="publisher-form" action="{{route('publishers.update',['id'=>$publisher['id']])}}"  onsubmit="checkPublisher()" method="POST">
        @csrf
        @method('PUT')

        <label for="publisher-name" >Name</label>
        <input type="text" value="{{$publisher['name']}}" id="publisher-name" name="publisher-name">
        <p id="publisher-name-error" class="error-message"  style="display: none;">Incorrect format</p>
        <div class="button-option-container">
            <a class="danger-option" href="{{route('publishers.index')}}">Cancel</a>
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
