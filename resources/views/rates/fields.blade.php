<!-- Currency Field -->
<div class="form-group create">
    {!! Form::label('currency', 'Currency:', ['class' => 'form-create']) !!}
    {!! Form::text('currency', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group create">
    {!! Form::label('value', 'Value:', ['class' => 'form-create']) !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group create save">
    {!! Form::submit('Save', ['class' => 'btn btn-primary save-button']) !!}
    <a href="{!! route('rates.index') !!}" class="btn btn-default">Cancel</a>
</div>
