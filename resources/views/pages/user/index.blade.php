@extends('layouts.adminLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Sign up"
    >
    </x-fixed.head>

@endsection

@section('mainContent')

    <section id="admin-users-section" class="wrapper">

        <x-table.table
            tableTitle="Active Users"
            tableClass="table-container"
            tableId="table-active-users"
            tableBodyId="active-users-body"
            :columnTitles="['Username', 'Email', 'Role', 'Created At', 'Update','Ban', 'Delete']" >
            @foreach($data['activeUsers'] as $user)
                <x-table.user-active-row
                    :user="$user"
                />
            @endforeach
        </x-table.table>


        <x-table.table
            tableTitle="Deleted Users"
            tableClass="table-container"
            tableId="table-deleted-users"
            tableBodyId="deleted-users-body"
            :columnTitles="['Username', 'Email', 'Role', 'Created At', 'Update','Activate']" >
            @foreach($data['deletedUsers'] as $user)
                <x-table.user-deleted-row
                    :user="$user"
                />
            @endforeach
        </x-table.table>



        <x-table.table
            tableTitle="Banned Users"
            tableClass="table-container"
            tableId="table-banned-users"
            tableBodyId="banned-users-body"
            :columnTitles="['Username', 'Email', 'Role', 'Created At', 'Update','Unban']" >
            @foreach($data['bannedUsers'] as $user)
                <x-table.user-banned-row
                    :user="$user"
                />
            @endforeach
        </x-table.table>

    </section>
@endsection
