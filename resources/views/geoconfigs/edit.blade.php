@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('core-templates::common.errors')
            <p class="create_title">Edit GeoConfig</p>
            <div class="row">
                {!! Form::model($geoconfig, ['route' => ['geoconfigs.update', $geoconfig->id], 'method' => 'patch']) !!}

                @include('geoconfigs.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
