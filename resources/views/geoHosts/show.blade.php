@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h2 style="margin: 0px; padding-bottom: 20px; text-align: center"><B>BALANCE</B></h2>

            <table class="table relation" style="width: 300px; text-align: center; margin: 0 auto;">
                <thead class="thead-inverse">
                    <th style="text-align: center;">Currency</th>
                    <th style="text-align: center;">Amount</th>
                </thead>
                <tbody>
                    @each('geoHosts.balance', $balances, 'balance')
                </tbody>
            </table>

            <p class="create_title">GeoHost Information</p>
            @include('geoHosts.show_fields')

            @include('geoHosts.relation')
            <div class="form-group back">
                <a href="{!! route('geoHosts.index') !!}" class="btn btn-default">Go to Geo Host List</a>
            </div>

        </div>
        <div class="col-md-1"></div>

    </div>

@endsection


