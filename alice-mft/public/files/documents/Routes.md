# Routes

## Introduction
Routes are fundamental to redirect requests on actions (views or controllers). We will also see how to route a request through middleware.

> When the client wants to load a web page, it sends a request to the server. The server will then process the request and send back to the client the result he wanted.

## Requests
There are several types of HTTP requests, but we will focus on one in particular: the *GET* request! When you load a page in your browser, such as https://home.cern/fr/science/alice you make a *GET* request.

This means that you send a message to the server, with a specific path. For the ALICE page, you send a message to the CERN server with the path `en/science/alice`. The server detects this message, processes it, and returns the ALICE page.

![](../images/documentation/request.png)

> The diagram above represents the exchanges between a client and the server.

Another known query type is the *POST* query. It is often used for sending form data, but we will come back to this later.

When you load a page with your browser, the *GET* request is called. This is the most common type of request.

## Basic routing


Now, let's manage these routes with Laravel. We will have to write code in the file `routes/web.php`.

First of all, we must choose which type of request to use. Then, we just have to call the *Route* class. Then we have to choose the path of the request, and the action to perform. Then, we can :
- Redirect the request
- Return a view
- Call a controller

Let's take the example of a *GET* request to the server root (*url = "/"*) to illustrate these three cases:

```php
// Here, we redirect the client on 'new/path/to/redirect'
Route::redirect("/", "new/path/to/redirect");

Route::get("/", function () {
    return redirect("new/path/to/redirect");
});

// Here, we display the view 'path/to/view' to the client
Route::view("/", "path/to/view");

Route::get("/", function () {
    return view("path/to/view");
});

// Here, we call the function 'FunctionToCall' which is in the class 'ControllerClass'
Route::get("/", "ControllerClass@FunctionToCall");
```

Here are three options that redirect to three different issues.

## Route parameters
It is possible to add variable parameters in the urls. For example, if I want to retrieve a user according to his identifier, I can do like this:

```php
Route::get("users/{id}", "Users@__construct");
```

The controller will look like this:

```php
<?php

namespace App\Http\Controllers;

class User extends Controller {

    public function __construct($id) {
        ...
    }

}
```
When loading the `/users/Joe` page, the server calls the `__construct` function with the value `Joe`.

It is also possible to set optional parameters. In this case, you have to modify the controller like this :
```php
<?php

namespace App\Http\Controllers;

class User extends Controller {

    public function __construct($id = null) {
        ...
    }

}
```

## Route filtering
It is also possible to filter certain types of parameters. For example, if you want to search for a user with his identifier, you can filter some parameters with a pattern matching system.

```php
Route::get("users/{id}", function ($id) {
    ...
})->where("id", "[A-Za-z]+");
```

By adding `->where("<parameter>, <pattern>")` you restrict the route to parameters that check the pattern.


## Route groups
To simplify the paths, it is possible to create groups.

If for example I want to create three pages :
- A login page (path = `account/login`)
- A registration page (path = `account/register`)
- A profile page (path = `account/profile`)

It is possible to use the syntax below :

```php
Route::group(["prefix" => "account"], function () {
    Route::get("profile/", ...);
    Route::get("login/", ...);
    Route::get("logout/", ...);
});
```

## Middleware

To assign a middleware to a route, you can proceed like this:

```php
// Use the middleware name (must be declared in Kernel.php)
Route::get("admin/profile", function () {
    ...
})->middleware("auth");

// Use many middlewares
Route::get("/", function () {
    ...
})->middleware("first", "second");

// Use the middleware class
Route::get("admin/profile", function () {
    ...
})->middleware(Authenticate::class);
```

Once this is done, the request will go through the middleware before succeeding or not!
