<!-- Currency Field -->
<div class="form-group view">
    {!! Form::label('currency', 'Currency:', ['class' => 'form-view']) !!}
    {!! Form::text('currency', $rate->currency, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Value Field -->
<div class="form-group view">
    {!! Form::label('value', 'Value:', ['class' => 'form-view']) !!}
    {!! Form::text('value', $rate->value, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group view">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'form-view']) !!}
    {!! Form::text('updated_at', $rate->updated_at, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

