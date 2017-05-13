@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <p class="create_title">Simcard Infos</p>
            @include('simcards.show_fields')
            {{--@include('simcards.relation')--}}
            <div class="form-group back">
                <a href="{!! route('simcards.index') !!}" class="btn btn-default">Go to SimCards List</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
