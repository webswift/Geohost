<!-- GeoHost Field -->
@if (!isset($statement))
    <div class="form-group create">
        {!! Form::label('geohost_id', 'GeoHost:', ['class' => 'form-create']) !!}
        <select class="form-control" id="geohost_id" name="geohost_id">
            <option selected="selected" disabled="true" hidden="true" value="">Select Geo Host</option>

            @foreach($geoHosts as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
@else
    {!! Form::hidden('geohost_id', $statement->geohost_id) !!}
@endif

<!-- StatementId Field -->
@if (!isset($statement))
    <div class="form-group create">
        {!! Form::label('statement_id[]', 'Statement:', ['class' => 'form-create']) !!}
        {!! Form::select('statement_id[]', ['0' => 'Select a Statement  '], null, ['multiple' => true, 'class' => 'form-control statement_selector']) !!}
    </div>
@else
    {!! Form::hidden('statement_id', $statement->id) !!}
@endif

<!-- Amount Field -->
<div class="form-group create">
    {!! Form::label('amount', 'Amount:', ['class' => 'form-create']) !!}

    @if (isset($statement))
        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Currency Field -->
<div class="form-group create">
    {!! Form::label('currency', 'Currency:', ['class' => 'form-create']) !!}
    <select class="form-control" id="currency" name="currency">
        <option selected="selected" disabled="true" hidden="true" value="">Select Currency</option>
        @foreach($rates as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>

<!-- Description Field -->
<div class="form-group create">
    {!! Form::label('description', 'Description:', ['class' => 'form-create']) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group create save">
    {!! Form::submit('Save', ['class' => 'btn btn-primary save-button']) !!}
    <a href="{!! route('payments.index') !!}" class="btn btn-default">Cancel</a>
</div>