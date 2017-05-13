@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Payments</h1>

        @if ( Auth::user()->admin )
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('payments.create') !!}">Add New</a>
        @endif

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('payments.table')
        
@endsection
