<!-- Firstname Field -->
<div class="form-group view">
    {!! Form::label('firstname', 'Firstname:', ['class' => 'form-view']) !!}
    {!! Form::text('firstname', $geoHost->firstname, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group view">
    {!! Form::label('lastname', 'Lastname:', ['class' => 'form-view']) !!}
    {!! Form::text('lastname', $geoHost->lastname, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group view">
    {!! Form::label('telephone', 'Telephone:', ['class' => 'form-view']) !!}
    {!! Form::text('telephone', $geoHost->telephone, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Email Field -->
<div class="form-group view">
    {!! Form::label('email', 'Email:', ['class' => 'form-view']) !!}
    {!! Form::text('email', $geoHost->email, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Address Field -->
<div class="form-group view">
    {!! Form::label('address', 'Address:', ['class' => 'form-view']) !!}
    {!! Form::text('address', $geoHost->address, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- City Field -->
<div class="form-group view">
    {!! Form::label('city', 'City:', ['class' => 'form-view']) !!}
    {!! Form::text('city', $geoHost->city, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Country Field -->
<div class="form-group view">
    {!! Form::label('country', 'Country:', ['class' => 'form-view']) !!}
    {!! Form::text('country', $geoHost->country, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Zip Code Field -->
<div class="form-group view">
    {!! Form::label('zip_code', 'Zip Code:', ['class' => 'form-view']) !!}
    {!! Form::text('zip_code', $geoHost->zip_code, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group view">
    {!! Form::label('payment_type', 'Payment Type:', ['class' => 'form-view']) !!}
    {!! Form::text('payment_type', $geoHost->payment_type, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Paypal Email Field -->
<div class="form-group view">
    {!! Form::label('paypal_email', 'Paypal Email:', ['class' => 'form-view']) !!}
    {!! Form::text('paypal_email', $geoHost->paypal_email, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Iban Field -->
<div class="form-group view">
    {!! Form::label('iban', 'Iban:', ['class' => 'form-view']) !!}
    {!! Form::text('iban', $geoHost->iban, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Ach Routing Number Field -->
<div class="form-group view">
    {!! Form::label('ach_routing_number', 'Ach Routing Number:', ['class' => 'form-view']) !!}
    {!! Form::text('ach_routing_number', $geoHost->ach_routing_number, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Ach Account Number Field -->
<div class="form-group view">
    {!! Form::label('ach_account_number', 'Ach Account Number:', ['class' => 'form-view']) !!}
    {!! Form::text('ach_account_number', $geoHost->ach_account_number, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Created At Field -->
<div class="form-group view">
    {!! Form::label('created_at', 'Created At:', ['class' => 'form-view']) !!}
    {!! Form::text('created_at', $geoHost->created_at, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group view">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'form-view']) !!}
    {!! Form::text('updated_at', $geoHost->updated_at, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

