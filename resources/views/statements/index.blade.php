@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Statements</h1>

        @if ( Auth::user()->admin )
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('statements.create') !!}">Add New</a>
        @endif

        <a class="btn btn-primary pull-right" style="margin-top: 25px; margin-right: 7px" href="{!! route('statements.index', ['showMode' => $ShowAllCaption == 'Show All' ]) !!}">{{ $ShowAllCaption }}</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('statements.table')
        
@endsection
