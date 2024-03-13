@extends('layouts.adminLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')

    <section id="admin-users-section" class="wrapper">

        <x-table.table
            tableTitle="Active Categories"
            tableClass="table-container"
            tableId="table-active-categories"
            tableBodyId="active-category-body"
            :columnTitles="['Name', 'Parent Category', 'Book Count', 'Created At','Update', 'Delete']" >
            @foreach($data['activeCategories'] as $category)
                <x-table.category-active-row
                    :category="$category"
                />
            @endforeach
        </x-table.table>

        <div class="add-button-container add-buttons-container" >
            <a class="safe-option" href="{{route('admin.index')}}">Return to Admin Panel</a>
            <a class="safe-option" href="{{route('categories.create')}}">Add Category</a>

        </div>


        <x-table.table
            tableTitle="Deleted Categories"
            tableClass="table-container"
            tableId="table-deleted-categories"
            tableBodyId="deleted-category-body"
            :columnTitles="['Name', 'Parent Category','Book Count', 'Deleted At','Update', 'Activate']" >
            @foreach($data['deletedCategories'] as $category)
                <x-table.category-deleted-row
                    :category="$category"
                />
            @endforeach
        </x-table.table>
@endsection
