@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('core-templates::common.errors')
            <p class="create_title">Edit Statement</p>
            <div class="row">
                {!! Form::model($statement, ['route' => ['statements.update', $statement->id], 'method' => 'patch']) !!}

                @include('statements.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
