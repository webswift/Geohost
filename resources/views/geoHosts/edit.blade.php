@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @include('core-templates::common.errors')
            <p class="create_title">Edit GeoHost</p>
            <div class="row">
                {!! Form::model($geoHost, ['route' => ['geoHosts.update', $geoHost->id], 'method' => 'patch']) !!}

                @include('geoHosts.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

@endsection
