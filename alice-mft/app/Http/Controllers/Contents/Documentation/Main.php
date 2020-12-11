<?php

namespace App\Http\Controllers\Contents\Documentation;

use App\Http\Controllers\Assets\Parsedown;
use App\Http\Controllers\Controller;

class Main extends Controller {

    public function __construct($section = null) {
        $parsedown = new Parsedown();
        $file = "files/documents/" . strtolower($section ?? "main") . ".md";

        if (file_exists($file)) {
            return view("contents/documentation/main", [
                "contents" => $parsedown->text(file_get_contents($file))
            ]);
        }

        abort(404);
    }

}
