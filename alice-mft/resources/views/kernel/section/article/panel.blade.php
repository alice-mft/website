@section("menu")
    <nav id="menu">
        <img src="{{ asset("img/mft/banner-dark.png") }}" />
        <div>
            <a href="{{ url("documentation") }}">Overview</a>
            <a href={{ url("documentation/views") }}>Users</a>
            <a href={{ url("documentation/controllers") }}>Data</a>
            <a class="special red" href={{ url("dashboard") }}>Back</a>
        </div>
    </nav>
@endsection
