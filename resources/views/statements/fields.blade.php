<!-- GeoHost Field -->
@if (!isset($geoHostId))
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
    {!! Form::hidden('geohost_id', $geoHostId) !!}
@endif

<!-- Short Description Field -->
<div class="form-group create">
    {!! Form::label('short_description', 'Short Description:', ['class' => 'form-create']) !!}
    {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Description Field -->
<div class="form-group create">
    {!! Form::label('long_description', 'Long Description:', ['class' => 'form-create']) !!}
    {!! Form::textarea('long_description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Amount Field -->
<div class="form-group create">
    {!! Form::label('amount', 'Amount:', ['class' => 'form-create']) !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-group create save">
    {!! Form::submit('Save', ['class' => 'btn btn-primary save-button']) !!}
    <a href="{!! route('statements.index') !!}" class="btn btn-default">Cancel</a>
</div>
