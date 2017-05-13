<!-- User Id Field -->
@if (!isset($userId))
    <div class="form-group create">
        {!! Form::label('user_id', 'User Info:', ['class' => 'form-create']) !!}
        {!! Form::select('user_id', (['0' => 'Select a GeoHost  '] + $users), null, ['class' => 'form-control']) !!}
    </div>
@else
    {!! Form::hidden('user_id', $userId) !!}
@endif

<!-- Firstname Field -->
<div class="form-group create">
    {!! Form::label('firstname', 'Firstname:', ['class' => 'form-create']) !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group create">
    {!! Form::label('lastname', 'Lastname:', ['class' => 'form-create']) !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group create">
    {!! Form::label('telephone', 'Telephone:', ['class' => 'form-create']) !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group create">
    {!! Form::label('email', 'Email:', ['class' => 'form-create']) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group create">
    {!! Form::label('payment_type', 'Payment Type:', ['class' => 'form-create']) !!}
    {!! Form::select('payment_type', ['PayPal' => 'PayPal', 'Direct Deposit (International)' => 'Direct Deposit (International)', 'Direct Deposit (USA)' => 'Direct Deposit (USA)'], null, ['class' => 'form-control']) !!}
</div>

<!-- Paypal Email Field -->
<div class="form-group create">
    {!! Form::label('paypal_email', 'Paypal Email:', ['class' => 'form-create']) !!}
    {!! Form::email('paypal_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Iban Field -->
<div class="form-group create">
    {!! Form::label('iban', 'Iban:', ['class' => 'form-create']) !!}
    {!! Form::text('iban', null, ['class' => 'form-control']) !!}
</div>

<!-- Ach Routing Number Field -->
<div class="form-group create">
    {!! Form::label('ach_routing_number', 'Ach Routing Number:', ['class' => 'form-create']) !!}
    {!! Form::text('ach_routing_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Ach Account Number Field -->
<div class="form-group create">
    {!! Form::label('ach_account_number', 'Ach Account Number:', ['class' => 'form-create']) !!}
    {!! Form::text('ach_account_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group create">
    {!! Form::label('address', 'Address:', ['class' => 'form-create']) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group create">
    {!! Form::label('city', 'City:', ['class' => 'form-create']) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Zip Code Field -->
<div class="form-group create">
    {!! Form::label('zip_code', 'Zip Code:', ['class' => 'form-create']) !!}
    {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group create">
    {!! Form::label('country', 'Country:', ['class' => 'form-create']) !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group create save">
    {!! Form::submit('Save', ['class' => 'btn btn-primary save-button']) !!}
    <a href="{!! route('geoHosts.index') !!}" class="btn btn-default">Cancel</a>
</div>
