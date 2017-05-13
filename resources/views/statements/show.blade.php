@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <p class="create_title">Statement Infos</p>
            @include('statements.show_fields')

            <div class="form-group back">
                   <a href="{!! route('statements.index') !!}" class="btn btn-default back">Go to Statements List</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

