<!-- Geoconfig Id Field -->
<div class="form-group view">
    {!! Form::label('geoconfig_id', 'Geoconfig Id:', ['class' => 'form-view']) !!}
    {!! Form::text('geoconfig_id', $simcard->geoconfig_id, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Geohost Payer Id Field -->
<div class="form-group view">
    {!! Form::label('geohost_id', 'Geohost Name:', ['class' => 'form-view']) !!}
    {!! Form::text('geohost_id', $full_name, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Provider Field -->
<div class="form-group view">
    {!! Form::label('provider', 'Provider:', ['class' => 'form-view']) !!}
    {!! Form::text('provider', $simcard->provider, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Network Field -->
<div class="form-group view">
    {!! Form::label('network', 'Network:', ['class' => 'form-view']) !!}
    {!! Form::text('network', $simcard->network, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Location Field -->
<div class="form-group view">
    {!! Form::label('location', 'Location:', ['class' => 'form-view']) !!}
    {!! Form::text('location', $simcard->location, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Country Field -->
<div class="form-group view">
    {!! Form::label('country', 'Country:', ['class' => 'form-view']) !!}
    {!! Form::text('country', $simcard->country, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group view">
    {!! Form::label('phone_number', 'Phone Number:', ['class' => 'form-view']) !!}
    {!! Form::text('phone_number', $simcard->phone_number, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Sim Number Field -->
<div class="form-group view">
    {!! Form::label('sim_number', 'Sim Number:', ['class' => 'form-view']) !!}
    {!! Form::text('sim_number', $simcard->sim_number, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Pin1 Field -->
<div class="form-group view">
    {!! Form::label('pin1', 'Pin1:', ['class' => 'form-view']) !!}
    {!! Form::text('pin1', $simcard->pin1, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Puk1 Field -->
<div class="form-group view">
    {!! Form::label('puk1', 'Puk1:', ['class' => 'form-view']) !!}
    {!! Form::text('puk1', $simcard->puk1, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Pin2 Field -->
<div class="form-group view">
    {!! Form::label('pin2', 'Pin2:', ['class' => 'form-view']) !!}
    {!! Form::text('pin2', $simcard->pin2, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Puk2 Field -->
<div class="form-group view">
    {!! Form::label('puk2', 'Puk2:', ['class' => 'form-view']) !!}
    {!! Form::text('puk2', $simcard->puk2, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Plan Data Field -->
<div class="form-group view">
    {!! Form::label('plan_data', 'Plan Data:', ['class' => 'form-view']) !!}
    {!! Form::text('plan_data', $simcard->plan_data, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Plan Cycle Field -->
<div class="form-group view">
    {!! Form::label('plan_cycle', 'Plan Cycle:', ['class' => 'form-view']) !!}
    {!! Form::text('plan_cycle', $simcard->plan_cycle, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Plan Periods Field -->
<div class="form-group view">
    {!! Form::label('plan_periods', 'Plan Periods:', ['class' => 'form-view']) !!}
    {!! Form::text('plan_periods', $simcard->plan_periods, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Plan Cost Field -->
<div class="form-group view">
    {!! Form::label('plan_cost', 'Plan Cost:', ['class' => 'form-view']) !!}
    {!! Form::text('plan_cost', $simcard->plan_cost, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Plan Type Field -->
<div class="form-group view">
    {!! Form::label('plan_type', 'Plan Type:', ['class' => 'form-view']) !!}
    {!! Form::text('plan_type', $simcard->plan_type, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Login Field -->
<div class="form-group view">
    {!! Form::label('login', 'Login:', ['class' => 'form-view']) !!}
    {!! Form::text('login', $simcard->login, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Password Field -->
<div class="form-group view">
    {!! Form::label('password', 'Password:', ['class' => 'form-view']) !!}
    {!! Form::text('password', $simcard->password, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Login Url Field -->
<div class="form-group view">
    {!! Form::label('login_url', 'Login Url:', ['class' => 'form-view']) !!}
    {!! Form::text('login_url', $simcard->login_url, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>