<h3 style="margin: 40px 0; text-align: center"><B>Relation Infos</B></h3>

<div class="form-group view">
    <h5 style="width: 18%"><B>SimCards : </B></h5>
{{--<table style="width: 100%">--}}
    {{--<tr>--}}
        {{--<td style="text-align: center; vertical-align: text-top;"><h5><B>SimCards : </B></h5></td>--}}
        {{--<td colspan="6">--}}

            <?php $simCard= $geoconfig->simCards; ?>

            @if (sizeof($simCards) != 0)
                <table class="table relation" style="width: 82%">
                    <thead class="thead-inverse">
                    <th>Provider </th>
                    <th>Network </th>
                    <th>Phone Number </th>
                    <th>Sim Number </th>
                    <th>Action </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$simCards->provider}} </td>
                            <td> {{$simCards->network}} </td>
                            <td> {{$simCards->phone_number}} </td>
                            <td> {{$simCards->sim_number}} </td>
                            <td>
                                <div class='btn-group'>
                                    <a href="{{ route('simcards.show', $simCards->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('simcards.edit', $simCards->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @else
                <h5>No Sim Card!!!</h5>
            @endif
        {{--</td>--}}
    {{--</tr>--}}
{{--</table>--}}
</div>