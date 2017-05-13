@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('core-templates::common.errors')
            <p class="create_title">Create New Rate</p>
            <div class="row">
                {!! Form::open(['route' => 'rates.store']) !!}

                @include('rates.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
