<!-- Country Code Field -->
<div class="form-group view">
    {!! Form::label('country_code', 'Country Code:', ['class' => 'form-view']) !!}
    {!! Form::text('country_code', $statement->country_code, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Region Field -->
<div class="form-group view">
    {!! Form::label('region', 'Region:', ['class' => 'form-view']) !!}
    {!! Form::text('region', $statement->region, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- City Field -->
<div class="form-group view">
    {!! Form::label('city', 'City:', ['class' => 'form-view']) !!}
    {!! Form::text('city', $statement->city, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>


<!-- Geo Type Field -->
<div class="form-group view">
    {!! Form::label('geo_type', 'Geo Type:', ['class' => 'form-view']) !!}
    {!! Form::text('geo_type', $geoconfig->geo_type, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Geo Device Field -->
<div class="form-group view">
    {!! Form::label('geo_device', 'Geo Device:', ['class' => 'form-view']) !!}
    {!! Form::text('geo_device', $geoconfig->geo_device, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Geo Provider Field -->
<div class="form-group view">
    {!! Form::label('geo_provider', 'Geo Provider:', ['class' => 'form-view']) !!}
    {!! Form::text('geo_provider', $geoconfig->geo_provider, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group view">
    {!! Form::label('updated_at', 'Last refresh:', ['class' => 'form-view']) !!}
    {!! Form::text('updated_at', $geoconfig->updated_at, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group view">
    {!! Form::label('start_date', 'Start Date:', ['class' => 'form-view']) !!}
    {!! Form::text('start_date', $geoconfig->start_date, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Monthly Payment Field -->
<div class="form-group view">
    {!! Form::label('monthly_payment', 'Monthly Payment:', ['class' => 'form-view']) !!}
    {!! Form::text('monthly_payment', $geoconfig->monthly_payment, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Payment Frequency Field -->
<div class="form-group view">
    {!! Form::label('payment_frequency', 'Payment Frequency:', ['class' => 'form-view']) !!}
    {!! Form::text('payment_frequency', $geoconfig->payment_frequency, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Payment Status Field -->
<div class="form-group view">
    {!! Form::label('payment_status', 'Payment Status:', ['class' => 'form-view']) !!}
    {!! Form::text('payment_status', $geoconfig->payment_status, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>
