@extends("kernel.template.article")
@extends("kernel.section.article.documentation")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/contents/documentation/main.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{asset("js/assets/waves.js")}}"></script>
    <script src="{{asset("js/contents/documentation/main.js")}}"></script>
@endsection

@section("background")
    <div id="background">
        <span class="top" data-height="30rem"></span>
        <canvas id="waves" height="200" width="1200"></canvas>
    </div>
@endsection

@section("section")
    <div id="foreground" style="display: flex;">
        <div class="box full markdown">
            {!! $contents ?? "An error occured" !!}
        </div>
    </div>
@endsection
