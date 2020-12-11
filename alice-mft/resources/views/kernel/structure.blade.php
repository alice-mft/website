<!DOCTYPE html>
<html lang="@yield("lang")" class="loading" style="background: #181818;">
<head>
    <!-- Title -->
    <title>@yield("title")</title>

    <!-- Links -->
    @yield("favicon")
    @yield("styles")

    <!-- Properties -->
    <meta property="og:title" content="@yield("title")" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="@yield("description")" />
    <meta property="og:site_name" content="@yield("name")" />

    <!-- Parameters -->
    <meta charset="@yield("charset")" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="author" content="@yield("author")" />
    <meta http-equiv="content-language" content="@yield("lang")" />
    <meta name="description" content="@yield("description")" />

    <!-- Other -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="display: none;" class="@yield("theme")">

    <!-- Loader -->
    <div id="loader">
        <span></span>
    </div>

    <!-- Container -->
    <div id="container" class="@yield("model")">
        @yield("container")
    </div>

    <!-- Scripts -->
    @yield("scripts")
</body>
</html>
