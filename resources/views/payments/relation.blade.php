<h3 style="margin: 40px 0; text-align: center"><B>Relation Infos</B></h3>

<div class="form-group view">
    <h5 style="width: 18%"><B>Statement : </B></h5>
    {{--{!! Form::label('payment', 'Payment:', ['class' => 'form-view']) !!}--}}

    <?php $statements = $payment->statements ?>

    @if (sizeof($statements) != 0)
        <table class="table relation" style="width: 82%">
            <thead class="thead-inverse">
            <th>Amount </th>
            <th>Currency </th>
            <th>Short Description </th>
            <th>Action </th>
            </thead>
            <tbody>
                @foreach($statements as $statement)
                    <tr>
                        <td> {{$statement->amount}} </td>
                        <td> {{$statement->currency}} </td>
                        <td> {{$statement->short_description}} </td>
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
        <h5>No Statement!!!</h5>
    @endif

</div>