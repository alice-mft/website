@extends("kernel.template.dashboard")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/contents/dashboard/main.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{asset("js/assets/waves.js")}}"></script>
    <script src="{{asset("js/contents/dashboard/main.js")}}"></script>
@endsection

@section("section")
    <div id="background">
        <span class="top" data-height="30rem"></span>
        <canvas id="waves" height="200" width="1200"></canvas>
    </div>

    <div id="foreground" style="display: flex;">
        <div id="article" class="markdown">
            {!! $contents !!}
        </div>
    </div>

@endsection
