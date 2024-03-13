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
            tableTitle="Visits"
            tableClass="table-container"
            tableId="table-active-users"
            tableBodyId="active-message-body"
            :columnTitles="['Page', 'Total visits', 'Total visits in %','Recent visits','Recent visits in %']" >
            @foreach($allVisits as $key => $visit)
                <tr>

                    <td>{{$key}}</td>
                    <td>{{$visit}}</td>
                    <td>{{number_format((100/$allSum)*($visit),2)}}%</td>
                    <td>@if(array_key_exists($key,$last24)){{$last24[$key]}} @else 0 @endif</td>
                    <td>@if(array_key_exists($key,$last24)){{number_format(100/$sum24 * $last24[$key],2)}}% @else 0% @endif</td>
                </tr>

            @endforeach
        </x-table.table>

@endsection
