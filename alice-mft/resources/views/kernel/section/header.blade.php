@section("header")
    <header id="header">
        <div>
            <a href="#"><img src="{{ asset("img/alice/icon.png") }}" /></a>
            <a href="#"><img src="{{ asset("img/mft/icon.png") }}" /></a>
            <a href="@if (session()->has("profile")) {{url("/dashboard")}} @else {{url("/")}} @endif" class="text">ALICE MFT</a>
        </div>

        @if(session()->has("profile"))
            <div class="profile">
                <a>{{ session()->get("account")->getCompleteName() }}</a>
                <div class="dropdown">
                    <div class="content">
                        <div class="picture">
                            <img src="{{ url("account") }}" />
                            <h2>{{ session()->get("profile")->getFirstName() }}</h2>
                            @if (session()->get("profile")->getType() == 2)
                                <label class="administrator">Administrator</label>
                            @else
                                <label class="user">User</label>
                            @endif
                        </div>
                        <div class="menu">
                            <ul>
                                @if (session()->get("account")->getType() == 2)
                                    <li class="panel">
                                        <a href="{{ url("panel") }}">Panel</a>
                                    </li>
                                @endif
                                <li class="documentation">
                                    <a href=" {{ url("documentation") }}">Documentation</a>
                                </li>
                                <li class="profile">
                                    <a href=" {{ url("profile") }}">Profile</a>
                                </li>
                                <li class="logout">
                                    <a id="logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </header>
@endsection
