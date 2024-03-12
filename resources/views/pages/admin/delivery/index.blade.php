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
            tableTitle="Active Delivery Types"
            tableClass="table-container"
            tableId="table-active-delivery-types"
            tableBodyId="active-delivery-body"
            :columnTitles="['Name', 'Orders Count', 'Created At','Update', 'Delete']" >
            @foreach($data['activeDeliveryOptions'] as $delivery)
                <x-table.delivery-active-row
                    :delivery="$delivery"
                />
            @endforeach
        </x-table.table>

        <div class="add-button-container add-buttons-container" >
            <a class="safe-option" href="{{route('delivery.create')}}">Add Delivery Type</a>

        </div>


        <x-table.table
            tableTitle="Deleted Delivery Types"
            tableClass="table-container"
            tableId="table-deleted-delivery-types"
            tableBodyId="deleted-delivery-body"
            :columnTitles="['Name', 'Orders Count', 'Deleted At','Update', 'Activate']" >
            @foreach($data['deletedDeliveryOptions'] as $delivery)
                <x-table.delivery-deleted-row
                    :delivery="$delivery"
                />
            @endforeach
        </x-table.table>
@endsection
