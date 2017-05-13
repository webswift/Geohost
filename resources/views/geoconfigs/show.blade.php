@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <p class="create_title">GeoConfig Infos</p>
            @if ( Auth::user()->admin )
                @include('geoconfigs.show_fields_admin')
            @else
                @include('geoconfigs.show_fields')
            @endif

            @include('geoconfigs.relation')
            <div class="form-group back">
                <a href="{!! route('geoconfigs.index') !!}" class="btn btn-default">Go to Geo Config List</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>


@endsection
