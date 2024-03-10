@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Login"
    />

@endsection

@section('mainContent')

    <section id="section-container" class="wrapper">

        <form id="filter-sort-section" enctype="multipart/form-data" method="GET">
            <div id="input-search-container">
                <input type="text" placeholder="Search" name="search" id="input-search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

            <h3 id="heading-price">Price</h3>
            <div id="price-container">
                <input type="number" min="0" placeholder="Min" id="price-min" name="price-min">
                <input type="number" min="0" placeholder="Max" id="price-max" name="price-max">
            </div>

            <p class="input-title book-category-title shop-heading" >Categories</p>
            <ul class="book-category-input" id="book-category-input-js">

                @foreach($data['categories'] as $parentCategory => $childCategories)
                    <li class="category-parent"><p><i class="fa-solid fa-angle-down"></i>{{$parentCategory}}</p>
                        <ul>
                            @foreach($childCategories as $category)
                                <li class='book-category-li'><input type='checkbox' name='book-category[]' class='book-category-cb' value='{{$category['id']}}' id='cb-{{$category['id']}}'><label for='cb-{{$category['id']}}'>{{$category['name']}}</label></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <p id="book-category-error"  class="error-message " style="display: none;">Can't be empty</p>

            <x-form.select
                for="sort"
                classLabel="shop-heading"
                label="Sort"
                selectName="sort"
                selectId="sort"
                selectClass="selectClass"
            >
                @foreach($data['sortOptions'] as $option)
                    <option value="{{$option['value']}}" >{{$option['name']}}</option>
                @endforeach
            </x-form.select>

        </form>

        <section id="section-articles">
            <ul id="articles-container-ul">
                @foreach($data['query'] as $book)
                    <li class="li-tag-article-container">
                        <x-slider.book-article :book="$book" />
                    </li>
                @endforeach
            </ul>

            <nav class="pagination-container" aria-label="Page navigation">
                <ul class="pagination" id="pagination-ul">
                    @if(count($data['query']))
                        @for($i=1; $i<=$data['query']->lastPage();$i++)
                                <?php $data['parameters']['page'] = $i ?>
                            <li class="page-item number @if($i == $data['query']->currentPage())active @endif"><a href="{{route('shop.index',$data['parameters'])}}" class="page-link">{{$i}}</a></li>
                        @endfor
                    @endif

                </ul>
            </nav>

            <div class="server-messages">
                @if(!count($data['query']))
                    <p class="error-message">We're sorry, but we couldn't find any books that match your interests.</p>
                @endif
            </div>
        </section>

    </section>

@endsection
