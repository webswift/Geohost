@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <p class="create_title">Payment Infos</p>
            @include('payments.show_fields')
            <p> </p>
            @include('payments.relation')
            <div class="form-group back">
                <a href="{!! route('payments.index') !!}" class="btn btn-default">Go to Payments List</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection
