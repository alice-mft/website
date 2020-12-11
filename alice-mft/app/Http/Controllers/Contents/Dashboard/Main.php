<?php

namespace App\Http\Controllers\Contents\Dashboard;

use App\Http\Controllers\Assets\Parsedown;
use App\Http\Controllers\Controller;

class Main extends Controller {

    public function __construct() {
        $parsedown = new Parsedown();
        $file = "doc/dashboard/main.md";

        if (file_exists($file)) {
            return view("contents/dashboard/main", [
                "contents" => $parsedown->text(file_get_contents($file))
            ]);
        }

        abort(404);
    }

}
