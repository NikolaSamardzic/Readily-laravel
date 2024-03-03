@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    />

@endsection


@section('header')
    <x-fixed.header>
        <x-fixed.navigation>
            @foreach($headerLinks as $link)
                <x-fixed.navigation-link
                    :href="$link['href']"
                    :name="$link['name']" />
            @endforeach
        </x-fixed.navigation>
    </x-fixed.header>
@endsection


@section('mainContent')
    <x-fixed.phone-navigation>
        @foreach($headerLinks as $link)
            <x-fixed.navigation-link
                :href="$link['href']"
                :name="$link['name']" />
        @endforeach
    </x-fixed.phone-navigation>
    <section class="insert-update-book-section wrapper">

        <form class="book-form-container" id="insert-book-form" enctype="multipart/form-data" name="insert-book-form" onsubmit="return sendInsertBookData()" action="{{route('books.store')}}" method="POST">
            @csrf
            <input type="number" name="writer-id" value="{{$data['user']['id']}}" hidden>
            <h2>Book Info</h2>

            <div class="book-image-container-form">
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
                    inputValue="{{old('book-title-input')}}"
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
                    inputValue="{{old('page-count-input')}}"
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
                    inputValue="{{old('price-input')}}"
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
                    inputValue="{{old('release-date-input')}}"
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
                        <option value="{{$publisher['id']}}" @if(old('publisher-input')==$publisher['id']){{'selected'}}@endif >{{$publisher['name']}}</option>
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
                    textValue="{{old('book-description-input')}}"
                />

                <p class="input-title book-category-title">Categories</p>
                <ul class="book-category-input" id="book-category-input-js">

                    @foreach($data['categories'] as $parentCategory => $childCategories)
                        <li class="category-parent"><p><i class="fa-solid fa-angle-down"></i>{{$parentCategory}}</p>
                            <ul>
                                @foreach($childCategories as $category)
                                    <li class='book-category-li'><input type='checkbox'  @if(old('book-category-cb')!=null && in_array($category['id'],old('book-category-cb'))){{'checked'}}@endif  name='book-category-cb[]' class='book-category-cb' value='{{$category['id']}}' id='cb-{{$category['id']}}'><label for='cb-{{$category['id']}}'>{{$category['name']}}</label></li>
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

                <input type="submit" class="safe-option" id="insert-new-book" value="Add Book">
            </div>
        </form>

    </section>
@endsection



@section('footer')
    <x-fixed.footer>

        <x-slot name="documentLinks">
            @foreach($footerLinks["documentLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                    :target="$link['target']"
                />
            @endforeach
        </x-slot>

        <x-slot name="socialMediaLinks">
            @foreach($footerLinks["socialMediaLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                    :target="$link['target']"
                />
            @endforeach
        </x-slot>

        <x-slot name="pageLinks">
            @foreach($footerLinks["pageLinks"] as $link)
                <x-fixed.footer-link
                    :href="$link['href']"
                    :name="$link['name']"
                />
            @endforeach
        </x-slot>

    </x-fixed.footer>
@endsection

@section('scripts')
    <x-fixed.scripts></x-fixed.scripts>
@endsection
