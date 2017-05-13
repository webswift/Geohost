@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('core-templates::common.errors')
            <p class="create_title">Create New GeoConfig</p>
            <div class="row">
                {!! Form::open(['route' => 'geoconfigs.store']) !!}

                @include('geoconfigs.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
