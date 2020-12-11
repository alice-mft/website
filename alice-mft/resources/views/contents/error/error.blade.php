@extends("kernel.template.basic")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/contents/error/error.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{asset("js/assets/waves.js")}}"></script>
    <script src="{{asset("js/librairies/parallax.min.js")}}"></script>
    <script src="{{asset("js/contents/error/error.js")}}"></script>
@endsection

@section("background")
    <div id="background">
        <span class="top" data-height="30rem"></span>
        <canvas id="waves" height="200" width="1200"></canvas>
    </div>
@endsection

@section("section")
    <div id="foreground" style="display: flex;">
        <div class="box">
            <img src="{{ asset("img/svg/error.svg") }}" />
            <h1>An error occured !</h1>
            <p>This site uses JavaScript features to enhance your experience. Unfortunately, you have disabled it and therefore we cannot provide you with access to the site.</p>
        </div>
    </div>
@endsection
