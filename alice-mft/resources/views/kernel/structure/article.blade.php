@section("model", "article")

@extends("kernel.structure")
@extends("kernel.configuration")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/kernel/template/article.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{ url("js/assets/scroller.js") }}"></script>
    <script src="{{ asset("js/kernel/template/article.js") }}"></script>
@endsection

@section("container")
    <section id="main">
        @yield("header")

        <section id="area" @yield("area")>
            @yield("background")
            @yield("menu")

            <div id="contents">
                @yield("section")
            </div>
        </section>

        @yield("footer")
    </section>
@endsection
