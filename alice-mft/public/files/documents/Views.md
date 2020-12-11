# Views

## Introduction

A view is a file that contains naive HTML code (devoid of any logic). It can be composed of variables, but no logical code (functions, queries, etc ...). The view corresponds to the final web page. It is the link between the framework and the user. Its purpose is to display some content on a screen.

> With Laravel, the views are saved in the `ressources/views` directory and have the extension `.blade.php`. Indeed, blade is the name of the template creation engine (which allows to model the views that are sent back to the client, i.e. the browser).

## Sections & extends
It is possible with blade to use Laravel's own instructions. For example, let's take the basic structure of an HTML page :

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My page !</title>
</head>

<body>
    <!-- we will put some code here -->
</body>
</html>
```

This code is entirely written in HTML (Laravel is not useful yet). Now let's imagine that we want to create several different pages (and therefore display a different code in the `<body>` tag without having to copy and paste the above structure on all the pages we are going to create).

It would then be very convenient to be able to modify only the content of the `<body>` tag. This is what we will do with Laravel. Here is how we will write the new structure of our page :

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My page !</title>
</head>

<body>
    @yield("content")
</body>
</html>
```

You can see that we have added the `@yield("content")` statement. This will be very handy later on during the creation of our pages. *We put the above code in a file we'll call `structure.blade.php`.*

Now if we want to create the `welcome.blade.php` page, we just have to create the file, and insert the code below:

```html
@extends("structure")
@section("content", "Hello World !")
```
The first instruction `@extends("structure")` will fetch the contents of `structure.blade.php` and load it (we extend the code to that of `structure.blade.php`).

Then, the second instruction `@section("content", "Hello World!")` will replace the `@yield("content")` contained in the structure file with our text `Hello World`.

Laravel assembles all this and returns the following code to the client:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My page !</title>
</head>

<body>
    Hello World !
</body>
</html>
```

> Obviously, the following code only appears when loading the `welcome.blade.php` page and the `structure.blade.php` page has not changed.

If you want to add more content than a simple string, it is also possible to add content like this:

```html
@section("content")
    <h1>Hello World !</h1>
    <p>I hope you understand everything on this page ...</p>
@endsection
```

## Variables use and interpretation

Controllers (which are detailed a little further on) can transmit variables to views that can interpret and possibly display them.

It is important to understand that the variables are made to be transmitted by the controller (we will come back to this later) and in this case, they do not need to be declared as in the majority of other languages.

Let's suppose that among the variables that the controller sends us, there is a variable `user_name` (string type) and `user_history` (array type).

In the code below, we display the user's name and history (if it exists and if it contains more than one item).
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My page !</title>
</head>

<body>
    <h1>Hello {{ $user_name }} ! Here is your history.</h1>
    @if ($user_history != null && count($user_history) > 0)
        @foreach ($user_history as $element)
            <p>{{ $element }}</p>
        @endforeach
    @endif
</body>
</html>
```
> As you can see, we use `{{ $variable_name }}` to display a variable.

For conditional expressions, the syntax is the following:
```html
@if (condition)
    ...
@endif
```
Finally, for foreachs (loops that list the elements of an array), the syntax is as follows:
```html
@foreach($array as $element)
    ...
@endforeach
```

## Structure
Everything you've just seen forms the basis of what you need to know to modify, add or remove portions of code.

Obviously, to simplify and optimize the code, the views of this project are structured in a very specific way. The basic structure of the project is a little more complex than the one seen above. You can find it here: `resources/views/assets/structure.blade.php` to modify it if needed.

Here is what the basic structure of each page looks like:
```html
<!DOCTYPE html>
<html lang="@yield("lang")">
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

<body>
    <!-- Container -->
    <div id="container" class="@yield("model")">
        @yield("container")
    </div>

    <!-- Scripts -->
    @yield("scripts")
</body>
</html>
```

Here, most of the parameters are already declared in the `resources/views/assets/configuration.blade.php` file that you can see below.


```html
@section("lang", "en")
@section("charset", "utf-8")

@section("name", "ALICE MFT")
@section("description", "Management panel for the ALICE MFT.")
@section("title", "ALICE MFT - Dashboard")
@section("author", "Timothée BAZIN")

@section("favicon")
    <link rel="icon" href="{{ url("images/alice-icon.png)") }}" />
@endsection

@section("styles")
    <link rel="stylesheet/less" type="text/css" href="{{ url("styles/assets/index.less") }}" />
@endsection

@section("scripts")
    <script src="{{ url("scripts/min/less.min.js") }}"></script>
    <script src="{{ url("scripts/min/jquery.min.js") }}"></script>
    <script src="{{ url("scripts/min/jquery-ui.min.js") }}"></script>
    <script src="{{ url("scripts/min/datatables.min.js") }}"></script>
    <script src="{{ url("scripts/index.js") }}"></script>
    <script src="{{ url("scripts/figures.js") }}"></script>
    <script src="{{ url("scripts/loader.js") }}"></script>
@endsection
```
We find all the small parameters of the structure code such as description and title. We also find the sections responsible for styles and scripts, which contain the styles and scripts common to all the pages. However, it is possible to manage LessCSS and JavaScript files directly from each view.

## Templates
For each page of the website, there is a *template* associated to that page, based on the structure seen above. It is this template that gives the page its original shape (the elements common to all pages that have the same template).

There are two different page templates : 
- The **basic** template, which is used for the *login* page, for example. This template is used by all the pages of the website which are composed of the basic structure namely a header, a footer, and a content section :

![](../images/documentation/basic-template.png)
> This represents the basic template (the striped area represents the content section).

- The **dashboard** template, which is used for the *ladder* page, for example. This template is used by all the pages that make up the dashboard. They contain a double-header, a footer, and a navigation menu:

![](../images/documentation/dashboard-template.png)
> This represents the dashboard template (the striped area represents the content section).

To create a new page, it is necessary to choose the appropriate template first. Then, you simply need to extend the page you want to create with the template of your choice. Here are the different possibilities:
- Basic: `@extends("assets/template/basic")` `.
- Dashboard: `@extends("assets/template/dashboard")`.

Once this is done, you have created your page. But then you have to add content to it. To do this, you have to fill the main section with HTML code. You can then use the previous method :
```html
@section("section")
    // your code here
@endsection
```

However, it is possible that the code you add in this section may need to be formatted with a LessCSS file, or be animated by a JavaScript file. It is therefore possible to add styles or scripts only on a specific page (it is indeed useless to load a script on all pages, if it is only useful on one).

To add a LessCSS file you can proceed like this:
```html
@section("styles")
    @parent
    // Add your style file here
@endsection
```

To add a JavaScript file:
```html
@section("scripts")
    @parent
    // Add your javascript file here
@endsection
```
You may have noticed the presence of the `@parent` attribute. Its presence is indispensable. It tells Laravel that you add an extra line to the *styles* or *scripts* section, and that you don't want to replace this section entirely.

Once this is done, you have finished the creation of your new page!

If we take the example of the main page, its source code is the following:
```html
@extends("assets/template/basic")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ url("styles/main.less") }}" />
@endsection

@section("section")
    <fieldset>
        <legend>Version 2.0.0</legend>
        <div class="title">
            <h1>ALICE MFT</h1>
            <p>A Large Ion Collider Experiment</p>
            <a href="{{ url("/account/login") }}" class="button">Access the dashboard</a>
        </div>
    </fieldset>
@endsection
```
We notice that it is a page from the *basic* template, and that a style file has been added to define a specific layout.
