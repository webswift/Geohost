@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Devices</h1>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('geoconfigs.table')
        
@endsection
