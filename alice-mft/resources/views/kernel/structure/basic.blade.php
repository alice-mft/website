@section("model", "basic")

@extends("kernel.structure")
@extends("kernel.configuration")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ url("css/kernel/template/basic.less") }}" />
@endsection

@section("container")
    <section id="main">
        @yield("background")
        @yield("header")

        <section id="area">
            @yield("section")
        </section>

        @yield("footer")
    </section>
@endsection
