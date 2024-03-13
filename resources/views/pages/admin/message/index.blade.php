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
            tableTitle="User Messages"
            tableClass="table-container"
            tableId="table-active-publishers"
            tableBodyId="active-message-body"
            :columnTitles="['Username', 'Email', 'Created At','Subject','Text', 'Delete']" >
            @foreach($messages as $message)
                <x-table.message-row
                    :message="$message"
                />
            @endforeach
        </x-table.table>

@endsection
