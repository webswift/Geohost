@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('core-templates::common.errors')
            <p class="create_title">Edit Rate</p>
            <div class="row">
                {!! Form::model($rate, ['route' => ['rates.update', $rate->id], 'method' => 'patch']) !!}

                @include('rates.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
