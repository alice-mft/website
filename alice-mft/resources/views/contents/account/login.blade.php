@extends("kernel.template.basic")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/contents/account/login.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{ url("js/assets/form.js") }}"></script>
    <script src="{{asset("js/assets/waves.js")}}"></script>
    <script src="{{asset("js/librairies/parallax.min.js")}}"></script>
    <script src="{{asset("js/contents/account/login.js")}}"></script>
@endsection

@section("section")
    <div id="background">
        <span class="top" data-height="30rem"></span>
        <canvas id="waves" height="200" width="1200"></canvas>
    </div>

    <div id="foreground" style="display: flex;">
        <div id="form">
            <h1>Sign In</h1>
            <img src="{{ asset("img/svg/login.svg") }}" />
            <form>
                <div class="field">
                    <label class="label" for="email">Email</label>
                    <input id="email" type="text" name="email" pattern="^[A-Za-z0-9._]+@[a-z]+\.[a-z]{2,3}$" required="">
                    <label class="helper" for="email">This address must be valid and will be verified after account creation.</label>
                </div>
                <div class="field">
                    <label class="label" for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=^.{8,}$).*$" required="">
                    <label class="helper" for="password">Your password must be at least one upper case character, one lower case character, one number, and must be more than 8 characters long.</label>
                </div>
                <div class="field">
                    <input type="checkbox" name="save" id="save">
                    <label class="label" for="save">Save the password on this computer</label>
                </div>
                <div class="field">
                    <button class="filled dark full">Login</button>
                </div>
                <div class="field">
                    <a href="../../account/login">Not registered yet ?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
