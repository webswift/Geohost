<h3 style="margin: 40px 0; text-align: center"><B>Relation Infos</B></h3>

<div class="form-group view" style="display: block">
    <div style="display: flex; margin: 20px 0;">
        <h5 style="width: 15%"><B>Devices : </B></h5>
        <table class="table relation" style="width: 85%">
            <thead class="thead-inverse">
                <th>Machine ID </th>
                <th>Host IP </th>
                <th>Host Port </th>
                <th>Guest IP </th>
                <th>Region </th>
                <th>City </th>
                <th style="width: 100px;">Action </th>
            </thead>
            <tbody>
            @foreach($geoHost->geoConfigs as $geoconfig)
                <tr>
                    <td>{{$geoconfig->machine_id}}</td>
                    <td>{{$geoconfig->host_ip}}</td>
                    <td>{{$geoconfig->host_port}}</td>
                    <td>{{$geoconfig->guest_ip}}</td>
                    <td>{{$geoconfig->region}}</td>
                    <td>{{$geoconfig->city}}</td>
                    <td>
                        <div class='btn-group'>
                            <a href="{{ route('geoconfigs.show', $geoconfig->id) }}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('geoconfigs.edit', $geoconfig->id) }}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; vertical-align: text-top;"><h5><B>SimCards : </B></h5></td>
                    <td colspan="6" >
                        @if (sizeof($geoconfig->simCards) != 0)
                            <table class="table relation">
                                <thead class="thead-inverse">
                                    <th>Provider </th>
                                    <th>Network </th>
                                    <th>Phone Number </th>
                                    <th>Sim Number </th>
                                    <th style="width: 92px;">Action </th>
                                </thead>
                                <tbody>
                                @foreach($geoconfig->simCards as $simcard)
                                    <tr>
                                        <td> {{$simcard->provider}} </td>
                                        <td> {{$simcard->network}} </td>
                                        <td> {{$simcard->phone_number}} </td>
                                        <td> {{$simcard->sim_number}} </td>
                                        <td>
                                            <div class='btn-group'>
                                                <a href="{{ route('simcards.show', $simcard->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <a href="{{ route('simcards.edit', $simcard->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h5>No Sim Card!!!</h5>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div style="display: flex; margin: 20px 0;">
        <h5 style="width: 15%"><B>Statements : </B></h5>
        @if (sizeof($geoHost->statements) != 0)
            <table class="table relation" style="width: 85%">
                <thead class="thead-inverse">
                    <th>Amount </th>
                    <th>Currency </th>
                    <th>Short Description </th>
                    <th style="width: 100px;">Action </th>
                </thead>

<!--                --><?php //$simCard= $geoconfig->simCards; ?>

                <tbody>
                    @foreach($geoHost->statements as $statement)
                        <tr>
                            <td>{{$statement->amount}}</td>
                            <td>{{$statement->currency}}</td>
                            <td>{{$statement->short_description}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="{{ route('statements.show', $statement->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('statements.edit', $statement->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            No Statements!!!
        @endif
    </div>

    <div style="display: flex; margin: 20px 0;">
        <h5 style="width: 15%"><B>Payments : </B></h5>
        @if (sizeof($geoHost->statements) != 0)
            <table class="table relation" style="width: 85%">
                <thead class="thead-inverse">
                <th>Amount </th>
                <th>Currency </th>
                <th>Description </th>
                <th style="width: 100px;">Action </th>
                </thead>
                <tbody>
                    @foreach($geoHost->payments as $payment)
                        <tr>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->currency}}</td>
                            <td>{{$payment->description}}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="{{ route('payments.show', $payment->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('payments.edit', $payment->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            No Payments!!!
        @endif
    </div>
</div>
