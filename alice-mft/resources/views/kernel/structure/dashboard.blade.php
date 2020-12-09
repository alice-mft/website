@section("model", "dashboard")

@extends("kernel.structure")
@extends("kernel.configuration")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/kernel/template/dashboard.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{ asset("js/librairies/datatables.min.js") }}"></script>
    <script src="{{ asset("js/kernel/template/dashboard.js") }}"></script>
@endsection

@section("container")
    @yield("top-header")
    @yield("options")
    @yield("navigation")

    <section id="main">
        @yield("header")

        <section id="area">
            @yield("section")
        </section>

        @yield("footer")
    </section>
@endsection
