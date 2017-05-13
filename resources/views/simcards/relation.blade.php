<h3 style="margin: 40px 0; text-align: center"><B>Relation Infos</B></h3>

<div class="form-group view">
    <h5 style="width: 18%"><B>Deivices : </B></h5>
        <table  class="table relation" style="width: 82%">
            <thead class="thead-inverse">
                <th>Machine ID </th>
                <th>Host IP </th>
                <th>Host Port </th>
                <th>Guest IP </th>
                <th>Region </th>
                <th>City </th>
                <th>Action </th>
            </thead>

            <?php $geoConfig = $simcard->geoConfig; ?>

            <tbody>
            <tr>
                <td> {{$geoConfig->machine_id}} </td>
                <td> {{$geoConfig->host_ip}} </td>
                <td> {{$geoConfig->host_port}} </td>
                <td> {{$geoConfig->guest_ip}} </td>
                <td> {{$geoConfig->region}} </td>
                <td> {{$geoConfig->city}} </td>
                <td>
{{--                            {!! Form::open(['route' => ['simcards.destroy', $simcard->geoConfig->id], 'method' => 'delete']) !!}--}}
                    <div class='btn-group'>
                        <a href="{{ route('geoconfigs.show', $geoConfig->id) }}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{{ route('geoconfigs.edit', $geoConfig->id) }}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    </div>
                    {{--{!! Form::close() !!}--}}
                </td>
            </tr>
            </tbody>
        </table>
</div>