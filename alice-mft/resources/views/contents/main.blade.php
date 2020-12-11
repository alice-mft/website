@extends("kernel.template.basic")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/contents/main.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{asset("js/assets/waves.js")}}"></script>
    <script src="{{asset("js/librairies/parallax.min.js")}}"></script>
    <script src="{{asset("js/contents/main.js")}}"></script>
@endsection

@section("background")
    <div id="background" data-height="calc(100vh - 4rem)">
        <canvas id="topWave" height="200" width="1200"></canvas>
        <span class="top" data-height="20rem"></span>
        <canvas id="bottomWave" height="200" width="1200"></canvas>
    </div>
@endsection

@section("section")
    <div id="foreground">
        <div id="title" data-depth="0.1">
            <h1>ALICE MFT</h1>
            <p>A Large Ion Collider Experiment</p>
            <ul>
                <li>Management dashboard</li>
                <li>Version 2.0.0</li>
            </ul>
        </div>
    </div>
@endsection
