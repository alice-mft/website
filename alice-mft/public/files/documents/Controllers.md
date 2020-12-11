# Controllers

## Introduction
As briefly explained in the views section, the controller is the *logical* part of the code.

When a request is detected, several choices are available:
- Directly return a specific view
- Calling a controller that can perform actions before returning a specific view

The advantage of the controller is that it allows to execute code (algorithms, queries, etc...) before returning a view with parameters (which can be processed and then displayed).

By default a controller looks like this:
```php
<?php

namespace App\Http\Controllers;

class MyController extends Controller {
    
    // Put your functions here.

}
```

It's a very simple structure: a PHP class (extended from the Controller class), where we can write functions that will be called later.

> The `namespace App\Http\Controllers;` corresponds to the namespace. To explain, it is possible and probable on some important projects that some variables or functions have the same name. To differentiate them, it is possible to make some kind of groups which take the form of namespaces.<br><br>
> Thus, all files that contain `namespace App\Http\Controllers;` belong to the same namespace and cannot contain two variables or two functions that have the same name.

## Views with parameters

Let's take an example: we want to make a page that lists the people registered for an event (these people will be stored in an array). You'll admit that it's complicated to make a system like this from a view because it's hard to write an algorithm or create an array.

If now we use a controller, it could take care of doing all the steps to retrieve the list of names and then call a view with the list as a parameter.

In such a case, the controller in question would look like this:

```php
<?php

namespace App\Http\Controllers;

class MyController extends Controller {

    public function __construct() {
        $list = $this->get_list(); // We get the list with a function
        
        return view("path/to/view", [ 
            "members" => $list
        ]);
    }

    public function get_list() {
        return ["John", "Edward", "Michel"];
    }
}
```
From our view, it will then be possible to retrieve the `$list` table in the following way: `{{ $members }}`. This syntax will retrieve the value associated to the `members` key in the array that has been provided to the view. 

You can then build the view that will be responsible for displaying the results, making sure that the list provided is not null, and not empty.
```blade
@extends("assets/template/basic")

@section("section")
    @if ($members != null && count($members) > 0)
        @foreach ($members as $member)
            <p>{{ $member }}</p>
        @endforeach
    @endif
@endsection
```
We will then get for our case:
```
<p>John</p>
<p>Edward</p>
<p>Michel</p>
```

Obviously we can imagine that the get_list function makes a SQL query before returning a result. This is what we will try to do next.

## SQL queries

We will see how to make a SQL query in a controller.

> Don't forget that controllers are PHP classes. So we can import elements (a bit like `@extends` in the views part).<br><br>
> To import a namespace, simply add the `use <namespace>;` statement to the page. Then, it is possible to use the classes and functions contained in this namespace.<br><br>
> Finally, if you want to import a specific class, it is possible to make a `use namespace>\<class>;` it is this last model which is the most used because it is easier to use.

To use SQL queries, we need to import the DB class with the `use Illuminate\Support\Facades\DB;` statement. We can then access to the `DB` class.

Here is a summary of what can be done with this class:
```php
// Running a SELECT statement
$result = DB::select("SELECT * FROM users WHERE id = ?", [1]);

// Running an INSERT statement
$result = DB::insert("INSERT INTO users (id, name) VALUES (?, ?)", [1, "Dayle"]);

// Running an UPDATE statement
$result = DB::select("UPDATE users SET votes = 100 WHERE name = ?", ["John"]);

// Running a DELETE statement
$result = DB::select("DELETE FROM users WHERE id = ?", [1]);

// Running a general statement
$result = DB::select("DROP TABLE users");
```

At the query level, it is possible to perform the same action in three different ways:

```php
$results = DB::select("SELECT * FROM users WHERE id = '1'");
$results = DB::select("SELECT * FROM users WHERE id = ?", [1]);
$results = DB::select("SELECT * FROM users WHERE id = :id", ["id" => 1]);
```

## The DashboardController
We saw what a Controller was. However, on many pages of the dashboard, you will have to perform SQL queries from user inputs.  So we need to create a form to retrieve this input, create an error page if the user input is not correct and finally create a page to display the results.

To avoid repetition in our code, we created a special controller, the DashboardController.

The new controller looks like this:

```php
<?php

namespace App\Http\Controllers;

class MyController extends DashboardController {
    
    public function __construct() {
        parent::__construct("ladder");
    }

}
```

> In the class constructor, the name of the page must be filled in. Thus, the `parent::__construct("ladder");` statement indicates that we are on the ladder page.

The DashboardController brings three new methods that simplify the code, they are presented below.

- Returns a customizable search page:

```php
$title = "The title of the page";
$placeholder = "The form placeholder";
$label = "An indicative label to help users";

return $this->search($title, $placeholder, $label);
```

- Returns a customizable error page that mentions the problems to the user:

```php
$title = "An error occurred.";
$commentary = "The commentary to help users.";

return $this->error($title, $commentary);
```

- Returns the data display page with its array of arguments :

```php
$data = "les valeurs à envoyer à la vue";

return $this->display([
    "data" => $data
]);
```

This makes it easier to create pages without writing a lot of code.

## The DocumentationController

This section is coming soon!
