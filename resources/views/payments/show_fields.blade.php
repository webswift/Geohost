<!-- Created At Field -->
<div class="form-group view">
    {!! Form::label('created_at', 'Created At:', ['class' => 'form-view']) !!}
    {!! Form::text('created_at', $payment->created_at, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group view">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'form-view']) !!}
    {!! Form::text('updated_at', $payment->updated_at, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Amount Field -->
<div class="form-group view">
    {!! Form::label('amount', 'Amount:', ['class' => 'form-view']) !!}
    {!! Form::text('amount', $payment->amount, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Currency Field -->
<div class="form-group view">
    {!! Form::label('currency', 'Currency:', ['class' => 'form-view']) !!}
    {!! Form::text('currency', $payment->currency, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Description Field -->
<div class="form-group view">
    {!! Form::label('description', 'Description:', ['class' => 'form-view']) !!}
    {!! Form::text('description', $payment->description, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Geohost Id Field -->
<div class="form-group view">
    {!! Form::label('geohost_id', 'Geohost Name:', ['class' => 'form-view']) !!}
    {!! Form::text('geohost_id', $full_name, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>