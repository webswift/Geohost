

<li class="{{ Request::is('statements*') ? 'active' : '' }}">
    <a href="{!! route('statements.index') !!}">Statements</a>
</li>

<li class="{{ Request::is('payments*') ? 'active' : '' }}">
    <a href="{!! route('payments.index') !!}">Payments</a>
</li>


@if ( Auth::user()->admin )
    <li class="active">
        <p>Administrator</p>

        <ul>
            <li class="{{ Request::is('geoHosts*') ? 'active' : '' }}">
                <a href="{!! route('geoHosts.index') !!}">Geo Hosts</a>
            </li>

            <li class="{{ Request::is('geoconfigs*') ? 'active' : '' }}">
                <a href="{!! route('geoconfigs.index') !!}">Geo Config</a>
            </li>

            <li class="{{ Request::is('simcards*') ? 'active' : '' }}">
                <a href="{!! route('simcards.index') !!}">SIM cards</a>
            </li>

            <li class="{{ Request::is('rates*') ? 'active' : '' }}">
                <a href="{!! route('rates.index') !!}">Rates</a>
            </li>

            <li>
                <a href="{{ url('/register') }}">Register</a>
            </li>
        </ul>
    </li>
@else
    <li class="{{ Request::is('geoconfigs*') ? 'active' : '' }}">
        <a href="{!! route('geoconfigs.index') !!}">Your Devices</a>
    </li>
@endif
