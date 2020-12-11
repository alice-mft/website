@section("model", "basic")

@extends("kernel.structure")
@extends("kernel.configuration")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ url("css/kernel/template/basic.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{ asset("js/kernel/template/basic.js") }}"></script>
@endsection

@section("container")
    <section id="main">
        @yield("header")

        <section id="area" @yield("area")>
            @yield("background")
            @yield("section")
        </section>

        @yield("footer")
    </section>
@endsection
