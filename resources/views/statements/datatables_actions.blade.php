{!! Form::open(['route' => ['statements.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    {{--<div class='btn btn-default btn-xs'>--}}
        {{--@if ($payment_id == 0)--}}
            {{--<i class="glyphicon glyphicon-usd"></i>--}}
        {{--@else--}}
            {{--<i class="glyphicon glyphicon-ok"></i>--}}
        {{--@endif--}}
    {{--</div>--}}

    <a href="{{ route('statements.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>

    @if ( Auth::user()->admin )
    <a href="{{ route('statements.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endif
</div>
{!! Form::close() !!}
