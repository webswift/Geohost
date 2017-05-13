<!-- Geohost Payer Id Field -->
<div class="form-group create">
    {!! Form::label('geohost_id', 'Geohost Id:', ['class' => 'form-create']) !!}
    <select class="form-control" id="geohost_id" name="geohost_id">
        <option selected="selected" disabled="true" hidden="true" value="">Select Geo Host</option>

        @foreach($geoHosts as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>

<!-- Geoconfig Id Field -->
<div class="form-group create">
    {!! Form::label('geoconfig_id', 'Geoconfig Id:', ['class' => 'form-create']) !!}
    {!! Form::select('geoconfig_id', ['0' => 'Select a GeoConfig  '], null, ['class' => 'form-control']) !!}
</div>

<!-- Provider Field -->
<div class="form-group create">
    {!! Form::label('provider', 'Provider:', ['class' => 'form-create']) !!}
    {!! Form::text('provider', null, ['class' => 'form-control']) !!}
</div>

<!-- Network Field -->
<div class="form-group create">
    {!! Form::label('network', 'Network:', ['class' => 'form-create']) !!}
    {!! Form::text('network', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group create">
    {!! Form::label('location', 'Location:', ['class' => 'form-create']) !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group create">
    {!! Form::label('country', 'Country:', ['class' => 'form-create']) !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group create">
    {!! Form::label('phone_number', 'Phone Number:', ['class' => 'form-create']) !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Sim Number Field -->
<div class="form-group create">
    {!! Form::label('sim_number', 'Sim Number:', ['class' => 'form-create']) !!}
    {!! Form::text('sim_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Pin1 Field -->
<div class="form-group create">
    {!! Form::label('pin1', 'Pin1:', ['class' => 'form-create']) !!}
    {!! Form::text('pin1', null, ['class' => 'form-control']) !!}
</div>

<!-- Puk1 Field -->
<div class="form-group create">
    {!! Form::label('puk1', 'Puk1:', ['class' => 'form-create']) !!}
    {!! Form::text('puk1', null, ['class' => 'form-control']) !!}
</div>

<!-- Pin2 Field -->
<div class="form-group create">
    {!! Form::label('pin2', 'Pin2:', ['class' => 'form-create']) !!}
    {!! Form::text('pin2', null, ['class' => 'form-control']) !!}
</div>

<!-- Puk2 Field -->
<div class="form-group create">
    {!! Form::label('puk2', 'Puk2:', ['class' => 'form-create']) !!}
    {!! Form::text('puk2', null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Data Field -->
<div class="form-group create">
    {!! Form::label('plan_data', 'Plan Data:', ['class' => 'form-create']) !!}
    {!! Form::text('plan_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Cycle Field -->
<div class="form-group create">
    {!! Form::label('plan_cycle', 'Plan Cycle:', ['class' => 'form-create']) !!}
    {!! Form::select('plan_cycle', ['Monthly' => 'Monthly', 'Weekly' => 'Weekly', '30days' => '30 days'], null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Periods Field -->
<div class="form-group create">
    {!! Form::label('plan_periods', 'Plan Periods:', ['class' => 'form-create']) !!}
    {!! Form::text('plan_periods', null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Cost Field -->
<div class="form-group create">
    {!! Form::label('plan_cost', 'Plan Cost:', ['class' => 'form-create']) !!}
    {!! Form::text('plan_cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Type Field -->
<div class="form-group create">
    {!! Form::label('plan_type', 'Plan Type:', ['class' => 'form-create']) !!}
    {!! Form::select('plan_type', ['Pre-paid' => 'Pre-paid', 'Post-paid' => 'Post-paid'], null, ['class' => 'form-control']) !!}
</div>

<!-- Login Field -->
<div class="form-group create">
    {!! Form::label('login', 'Login:', ['class' => 'form-create']) !!}
    {!! Form::text('login', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group create">
    {!! Form::label('password', 'Password:', ['class' => 'form-create']) !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>

<!-- Login Url Field -->
<div class="form-group create">
    {!! Form::label('login_url', 'Login Url:', ['class' => 'form-create']) !!}
    {!! Form::text('login_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group create save">
    {!! Form::submit('Save', ['class' => 'btn btn-primary save-button']) !!}
    <a href="{!! route('simcards.index') !!}" class="btn btn-default">Cancel</a>
</div>
