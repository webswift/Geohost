@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('core-templates::common.errors')
            <p class="create_title">Edit Rate</p>

            <script src="/js/simcard/create.js"></script>

            <div class="row">
                {!! Form::model($simcard, ['route' => ['simcards.update', $simcard->id], 'method' => 'patch']) !!}

                @include('simcards.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
