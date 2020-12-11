@section("lang", "en")
@section("charset", "utf-8")

@section("name", "ALICE MFT")
@section("description", "Management panel for ALICE MFT.")
@section("title", "ALICE MFT - Dashboard")
@section("author", "Timothée Bazin")

@section("theme", "light")

@section("favicon")
    <link rel="icon" href="{{ asset("img/alice/icon.png") }}" />
@endsection

@section("styles")
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/kernel/default.less") }}" />
@endsection

@section("scripts")
    <script src="{{ asset("js/librairies/sockjs.min.js") }}"></script>
    <script src="{{ asset("js/librairies/stomp.min.js") }}"></script>
    <script src="{{ asset("js/librairies/less.min.js") }}"></script>
    <script src="{{ asset("js/librairies/jquery.min.js") }}"></script>
    <script src="{{ asset("js/librairies/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("js/kernel/websocket.js") }}"></script>
    <script src="{{ asset("js/kernel/socket.js") }}"></script>
    <script src="{{ asset("js/kernel/default.js") }}"></script>
    <script src="{{ asset("js/assets/alert.js") }}"></script>
    <script src="{{ asset("js/assets/ajax.js") }}"></script>
    <script src="{{ asset("js/assets/animation.js") }}"></script>
    <script src="{{ asset("js/kernel/loader.js") }}"></script>
@endsection
