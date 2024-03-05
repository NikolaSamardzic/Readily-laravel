@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    >
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    </x-fixed.head>

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

    <section id="writer-books-section" class="wrapper">

        <x-table.table tableTitle="Active Books" :columnTitles="['Image', 'Title', 'Price', 'Release Date', 'Update', 'Delete']" >
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


        <x-table.table tableTitle="Deleted Books" :columnTitles="['Image', 'Title', 'Price', 'Deleted At', 'Update', 'Delete']" >
            @foreach($data['deletedBooks'] as $book)
                <x-table.writer-deleted-book-row
                    :book="$book"
                    :user="$data['user']"
                />
            @endforeach
        </x-table.table>
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
