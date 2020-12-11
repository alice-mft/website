# Middlewares

## Introduction
A middleware is a class that processes the request upstream when loading a page. It can be a form of page protection. For example, if you make a request on a page protected by a middleware, you will send a request to the server. This request will go through the middleware, which will decide to continue processing the request or redirect you to a new page.

![](../images/documentation/middleware.png)

> The diagram above schematizes the action of a middleware on an application.

It is possible to use a middleware to forbid certain requests (and thus pages) to certain users.

The middlewares are located in the `app/Http/Middleware` folder. By default, Laravel already has some of them. A middleware is in the following form:
```php
<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleware {
    
    public function handle($request, Closure $next) {
        // Your code here
        // It has to include a return !
    }

}
```

When receiving a request that goes through middleware, the handle function is called first. Laravel then waits for a return. Either you allow the request or you redirect the user to a new page.

## Create a middleware

Let's decide to create a middleware that forbids unidentified users to access the dashboard. If someone tries to access a page of the dashboard without having a profile, we will decide to redirect him to the login page. 

```php
<?php

namespace App\Http\Middleware;

use Closure;

class Login {

    public function handle($request, Closure $next) {

        // Si la session associée à la requête contient un profil associé
        if ($request->session()->has("account")) {

            // On autorise la requête
            return $next($request);
        }
  
        // On redirige l'utilisateur à la page d'identification.
        return redirect("login");
    }

}
```

If we decide to use a shorter syntax, we can define the handle function like this:

```php
public function handle($request, Closure $next) {
    return $request->session()->has("profile") ? $next($request) : redirect("login");
}
```

> It is exactly the same function, it uses a ternary structure namely `return (condition)? <returned result if condition is true> : <returned result else>`;

## Declare it to use it
Once our middleware has been created, we still have to declare it in the middleware list. To do this, you have to open the `app/Http/Kernel.php` file. Then you just have to add an entry in the `$routeMiddleware` array with the following format: `'login' => \App\Http\Middleware\Login::class` namely the name of the middleware in key and the class in value.

![](../images/documentation/middleware-list.png)

> The diagram above reprensents the $routeMiddleware array.

Once that's done, we just have to apply the middleware on specific routes, but we'll see that later.
