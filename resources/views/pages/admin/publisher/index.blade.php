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
            tableTitle="Active Publishers"
            tableClass="table-container"
            tableId="table-active-publishers"
            tableBodyId="active-publishers-body"
            :columnTitles="['Name', 'Book Count', 'Created At','Update', 'Delete']" >
            @foreach($data['activePublishers'] as $publisher)
                <x-table.publisher-active-row
                    :publisher="$publisher"
                />
            @endforeach
        </x-table.table>

        <div class="add-button-container add-buttons-container" >
            <a class="safe-option" href="{{route('admin.index')}}">Return to Admin Panel</a>
            <a class="safe-option" href="{{route('publishers.create')}}">Add Publisher</a>
        </div>


        <x-table.table
            tableTitle="Deleted Publishers"
            tableClass="table-container"
            tableId="table-deleted-publishers"
            tableBodyId="deleted-publishers-body"
            :columnTitles="['Name', 'Book Count', 'Deleted At','Update', 'Activate']" >
            @foreach($data['deletedPublishers'] as $publisher)
                <x-table.publisher-delete-row
                    :publisher="$publisher"
                />
            @endforeach
        </x-table.table>
    </section>
@endsection
