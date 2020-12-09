@section("navigation")
    <nav id="navigation">
        <div class="header">
            <a href="#"><img src="{{ url("img/mft/banner.png") }}" /></a>
        </div>

        <div class="body">
            <ul>
                <li class="selected">
                    <p class="reducable">Components</p>
                    <ul class="submenu">
                        <li>
                            <a href="{{ url("dashboard/ladder") }}">Ladder</a>
                        </li>
                        <li>
                            <a href="{{ url("dashboard/zone") }}">Zone</a>
                        </li>
                        <li>
                            <a href="{{ url("dashboard/face") }}">Face</a>
                        </li>
                        <li>
                            <a href="{{ url("dashboard/disk") }}">Disk</a>
                        </li>
                        <li>
                            <a href="{{ url("dashboard/cone") }}">Cone</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <p class="reducable">Systems</p>
                    <ul class="submenu">
                        <li>
                            <a href="{{ url("dashboard/power") }}">Power</a>
                        </li>
                        <li>
                            <a href="{{ url("dashboard/cooling") }}">Cooling</a>
                        </li>
                        <li>
                            <a href="{{ url("dashboard/ventilation") }}">Ventilation</a>
                        </li>
                        <li>
                            <a href="{{ url("dashboard/readout") }}">Readout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <p class="reducable">Externals links</p>
                    <ul class="submenu">
                        <li>
                            <a href="#">Twiki</a>
                        </li>
                        <li>
                            <a href="#">RC</a>
                        </li>
                        <li>
                            <a href="#">ALICE</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="footer">
            <p>Disconnected !</p>
        </div>
    </nav>
@endsection
