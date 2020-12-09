@section("menu")
    <nav id="menu">
        <img src="{{ asset("img/mft/banner-dark.png") }}" />
        <div>
            <a href="{{ url("account") }}">Profile</a>
            <a class="special red" href={{ url("dashboard") }}>Back</a>
        </div>
    </nav>
@endsection
