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
            tableTitle="User Orders"
            tableClass="table-container"
            tableId="table-active-publishers"
            tableBodyId="active-message-body"
            :columnTitles="['Username', 'Email', 'Finished at','Price','Status']" >
            @foreach($orders as $order)

                <x-table.order-row
                    :order="$order"
                />
            @endforeach
        </x-table.table>

@endsection
