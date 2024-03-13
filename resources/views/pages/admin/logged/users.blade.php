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
            tableTitle="Logged-in Users"
            tableClass="table-container"
            tableId="table-active-users"
            tableBodyId="active-message-body"
            :columnTitles="['Username', 'Email', 'Role','Date']" >
            @foreach($logs as $log)
                <x-table.log-user-row
                    :log="$log"
                />
            @endforeach
        </x-table.table>

@endsection
