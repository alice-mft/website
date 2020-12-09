@section("menu")
    <nav id="menu">
        <img src="{{ asset("img/mft/banner-dark.png") }}" />
        <div>
            <a href="{{ url("documentation") }}">Introduction</a>
            <a href={{ url("documentation/views") }}>Views</a>
            <a href={{ url("documentation/controllers") }}>Controllers</a>
            <a href={{ url("documentation/middlewares") }}>Middlewares</a>
            <a href={{ url("documentation/routes") }}>Routes</a>
            <a href={{ url("documentation/forms") }}>Forms</a>
            <a href={{ url("documentation/sessions") }}>Sessions</a>
            <a href={{ url("documentation/sessions") }}>Scripts</a>
            <a href={{ url("documentation/sessions") }}>Sockets</a>
            <a href={{ url("documentation/external-contents") }}>External contents</a>
            <a href={{ url("documentation/environnement-variables") }}>Environnement variables</a>
            <a class="special back" href={{ url("dashboard") }}>Back</a>
        </div>
    </nav>
@endsection
