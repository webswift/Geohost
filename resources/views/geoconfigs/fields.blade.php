<!-- GeoHost Id Field -->
@if (!isset($geoHostId))
    <div class="form-group create">
        {!! Form::label('geohost_id', 'GeoHost Info:', ['class' => 'form-create']) !!}
        {!! Form::select('geohost_id', (['0' => 'Select a GeoHost  '] + $geoHosts), null, ['class' => 'form-control']) !!}
    </div>
@else
    {!! Form::hidden('geohost_id', $geoHostId) !!}
@endif

<!-- Machine Id Field -->
<div class="form-group create">
    {!! Form::label('machine_id', 'Machine Id:', ['class' => 'form-create']) !!}
    {!! Form::text('machine_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Host Ip Field -->
<div class="form-group create">
    {!! Form::label('host_ip', 'Host Ip:', ['class' => 'form-create']) !!}
    {!! Form::text('host_ip', null, ['class' => 'form-control']) !!}
</div>

<!-- Host Port Field -->
<div class="form-group create">
    {!! Form::label('host_port', 'Host Port:', ['class' => 'form-create']) !!}
    {!! Form::text('host_port', null, ['class' => 'form-control']) !!}
</div>

<!-- Guest Ip Field -->
<div class="form-group create">
    {!! Form::label('guest_ip', 'Guest Ip:', ['class' => 'form-create']) !!}
    {!! Form::text('guest_ip', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Code Field -->
<div class="form-group create">
    {!! Form::label('country_code', 'Country Code:', ['class' => 'form-create']) !!}
    {!! Form::text('country_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Field -->
<div class="form-group create">
    {!! Form::label('region', 'Region:', ['class' => 'form-create']) !!}
    {!! Form::text('region', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group create">
    {!! Form::label('city', 'City:', ['class' => 'form-create']) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Dma Field -->
<div class="form-group create">
    {!! Form::label('dma', 'Dma:', ['class' => 'form-create']) !!}
    {!! Form::text('dma', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group create">
    {!! Form::label('status', 'Status:', ['class' => 'form-create']) !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Geo Type Field -->
<div class="form-group create">
    {!! Form::label('geo_type', 'Geo Type:', ['class' => 'form-create']) !!}
    {!! Form::text('geo_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Geo Device Field -->
<div class="form-group create">
    {!! Form::label('geo_device', 'Geo Device:', ['class' => 'form-create']) !!}
    {!! Form::text('geo_device', null, ['class' => 'form-control']) !!}
</div>

<!-- Geo Provider Field -->
<div class="form-group create">
    {!! Form::label('geo_provider', 'Geo Provider:', ['class' => 'form-create']) !!}
    {!! Form::text('geo_provider', null, ['class' => 'form-control']) !!}
</div>

<!-- Vpn Provider Field -->
<div class="form-group create">
    {!! Form::label('vpn_provider', 'Vpn Provider:', ['class' => 'form-create']) !!}
    {!! Form::text('vpn_provider', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group create">
    {!! Form::label('notes', 'Notes:', ['class' => 'form-create']) !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group create">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'form-create']) !!}
    {!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group create">
    {!! Form::label('start_date', 'Start Date:', ['class' => 'form-create']) !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Monthly Payment Field -->
<div class="form-group create">
    {!! Form::label('monthly_payment', 'Monthly Payment:', ['class' => 'form-create']) !!}
    {!! Form::text('monthly_payment', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Frequency Field -->
<div class="form-group create">
    {!! Form::label('payment_frequency', 'Payment Frequency:', ['class' => 'form-create']) !!}
    {!! Form::select('payment_frequency', ['Monthly' => 'MONTHLY'], null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Status Field -->
<div class="form-group create">
    {!! Form::label('payment_status', 'Payment Status:', ['class' => 'form-create']) !!}
    {!! Form::select('payment_status', ['Active' => 'ACTIVE', 'Inactive' => 'INACTIVE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group create save">
    {!! Form::submit('Save', ['class' => 'btn btn-primary save-button']) !!}
    <a href="{!! route('geoconfigs.index') !!}" class="btn btn-default">Cancel</a>
</div>
