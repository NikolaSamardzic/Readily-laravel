@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    >
    </x-fixed.head>

@endsection


@section('mainContent')

    <section id="writer-books-section" class="wrapper">

        <x-table.table
            tableTitle="Active Books"
            tableClass="table-container"
            tableId="active-books-table"
            :columnTitles="['Image', 'Title', 'Price', 'Release Date', 'Update', 'Delete']" >
            @foreach($data['activeBooks'] as $book)
                <x-table.writer-active-book-row
                    :book="$book"
                    :user="$data['user']"
                />
            @endforeach
        </x-table.table>

        <div class="add-button-container add-buttons-container" >
            <a class="safe-option" href="{{route('books.create',['user' => $data['user']])}}">Add Book</a>
        </div>


        <x-table.table
            tableTitle="Deleted Books"
            tableClass="table-container"
            tableId="deleted-books-table"
            :columnTitles="['Image', 'Title', 'Price', 'Deleted At', 'Update', 'Delete']" >
            @foreach($data['deletedBooks'] as $book)
                <x-table.writer-deleted-book-row
                    :book="$book"
                    :user="$data['user']"
                />
            @endforeach
        </x-table.table>
    </section>
@endsection
