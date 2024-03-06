@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    />

@endsection

@section('mainContent')
    <section class="insert-update-book-section wrapper">

        <form class="book-form-container" id="update-book-form" enctype="multipart/form-data" name="update-book-form" onsubmit="return sendUpdateBookData()" action="{{route('books.update',['book' => $data['book']])}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="writer-id" value="{{$data['user']['id']}}" hidden>
            <input type="number" name="book-id" value="{{$data['book']['id']}}" hidden>
            <h2>Book Info</h2>

            <div class="book-image-container-form">
                <img src="{{asset('assets/images/books/small/')}}/{{$data['book']->image['src']}}" alt="{{$data['book']->image['alt']}}">
            </div>

            <p class="upload-book-image-text">upload image of the book</p>

            <x-form.file-upload
                inputName="book-image"
                inputId="book-image-js"
                inputClass="book-image-form"
                idError="book-image-error"
                error="Please upload an image with a maximum size of 700KB and in one of the following formats: jpg, jpeg, or png. Image width needs to be smaller than its height"
            />

            <div class="info-container-grid book-info-container-grid">

                <x-form.input
                    for="book-title-title-js"
                    idLabel="book-title-title"
                    classLabel="input-title"
                    label="Book Title"
                    inputType="text"
                    inputName="book-title-input"
                    idInput="book-title-title-js"
                    classInput="book-title-input"
                    idError="book-title-error"
                    error="Can't be empty"
                    inputValue="{{old('book-title-input') != null ? old('book-title-input') : $data['book']['name']}}"
                />

                <x-form.input
                    for="page-count-input-js"
                    idLabel="page-count-title"
                    classLabel="input-title"
                    label="Page Count"
                    inputType="number"
                    inputName="page-count-input"
                    idInput="page-count-input-js"
                    classInput="page-count-input"
                    idError="page-count-error"
                    error="Can't be empty or less than 0"
                    inputValue="{{old('page-count-input') != null ? old('page-count-input') : $data['book']['page_count']}}"
                />

                <x-form.input
                    for="price-input-js"
                    idLabel="price-title"
                    classLabel="input-title"
                    label="Price"
                    inputType="number"
                    inputName="price-input"
                    idInput="price-input-js"
                    classInput="price-input"
                    idError="price-error"
                    error="Can't be empty or less than 0"
                    inputValue="{{old('price-input') != null ? old('price-input') : $data['book']['price']}}"
                />

                <x-form.input
                    for="release-date-input-js"
                    idLabel="release-date-title"
                    classLabel="input-title"
                    label="Release Date"
                    inputType="date"
                    inputName="release-date-input"
                    idInput="release-date-input-js"
                    classInput="release-date-input"
                    idError="release-date-error"
                    error="Can't be empty and can't be in future"
                    inputValue="{{old('release-date-input') != null ? old('release-date-input') : $data['book']['release_date']}}"
                />

                <x-form.select
                    for="publisher-input-js"
                    idLabel="publisher-title"
                    classLabel="input-title"
                    label="Publisher"
                    selectName="publisher-input"
                    selectId="publisher-input-js"
                    selectClass="publisher-input"
                    idError="publisher-error"
                    error="Can't be empty"
                >
                    @foreach($data['publishers'] as $publisher)
                        <option value="{{$publisher['id']}}" @if((old('publisher-input') != null ? old('publisher-input') : $data['book']['publisher_id'] ) ==$publisher['id']){{'selected'}}@endif >{{$publisher['name']}}</option>
                    @endforeach
                </x-form.select>

                <x-form.text-area
                    for="book-description-input-js"
                    idLabel="book-description-title"
                    classLabel="input-title"
                    label="Description"
                    textAreaName="book-description-input"
                    textAreaId="book-description-input-js"
                    textAreaClass="book-description-input"
                    idError="book-description-error"
                    error="Can't be empty"
                    displayed="1"
                    textValue="{{old('book-description-input') != null ? old('book-description-input') : $data['book']['description']}}"
                />

                <p class="input-title book-category-title">Categories</p>
                <ul class="book-category-input" id="book-category-input-js">

                    @foreach($data['categories'] as $parentCategory => $childCategories)
                        <li class="category-parent"><p><i class="fa-solid fa-angle-down"></i>{{$parentCategory}}</p>
                            <ul>
                                @foreach($childCategories as $category)
                                    <li class='book-category-li'><input type='checkbox'  @if( (old('book-category-cb') != null && in_array($category['id'], old('book-category-cb'))) || (old('book-category-cb') == null && in_array($category['id'], $data['selected_categories']))){{'checked'}}@endif  name='book-category-cb[]' class='book-category-cb' value='{{$category['id']}}' id='cb-{{$category['id']}}'><label for='cb-{{$category['id']}}'>{{$category['name']}}</label></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <p id="book-category-error"  class="error-message " style="display: none;">Can't be empty</p>
            </div>

            <div class="server-messages">
                @if($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
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
            </div>

            <div class="button-option-container">

                <input type="submit" class="safe-option" id="insert-new-book" value="Update">
            </div>
        </form>

    </section>
@endsection
