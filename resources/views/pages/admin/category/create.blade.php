@extends('layouts.adminLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')


    <form class="insert-update-row-form" id="categories-form" onsubmit="checkCategory()" action="{{route('categories.store')}}" method="POST">
        @csrf

        <label  id="select-category-label" for="select-category">Parent Category</label>
        <select  name="select-category" id="select-category">
            <option value="0">Select</option>
            @foreach($data['parentCategories'] as $category)
                <option value="{{$category['id']}}">{{$category['name']}}</option>
            @endforeach
        </select>

        <label for="category-name" >Name</label>
        <input type="text" id="category-name" name="category-name">
        <p id="category-name-error" class="error-message"  style="display: none;">Incorrect format</p>
        <div class="button-option-container">
            <a class="danger-option" href="{{route('categories.index')}}">Cancel</a>
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
