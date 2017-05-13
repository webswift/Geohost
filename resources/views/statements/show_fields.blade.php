<!-- Short Description Field -->
<div class="form-group view">
    {!! Form::label('short_description', 'Short Description:', ['class' => 'form-view']) !!}
    {!! Form::text('short_description', $statement->short_description, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Long Description Field -->
<div class="form-group view">
    {!! Form::label('long_description', 'Long Description:', ['class' => 'form-view']) !!}
    {!! Form::textarea('long_description', $statement->long_description, ['class' => 'form-control', 'rows' => '5', 'readonly' => 'true']) !!}
</div>

<!-- Amount Field -->
<div class="form-group view">
    {!! Form::label('amount', 'Amount:', ['class' => 'form-view']) !!}
    {!! Form::text('amount', $statement->amount, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Currency Field -->
<div class="form-group view">
    {!! Form::label('currency', 'Currency:', ['class' => 'form-view']) !!}
    {!! Form::text('currency', $statement->currency, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Geohost Id Field -->
<div class="form-group view">
    {!! Form::label('geohost_id', 'Geohost Name:', ['class' => 'form-view']) !!}
    {!! Form::text('geohost_id', $full_name, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>