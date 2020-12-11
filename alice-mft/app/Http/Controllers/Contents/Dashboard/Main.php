<?php

namespace App\Http\Controllers\Contents\Dashboard;

use App\Http\Controllers\Assets\Parsedown;
use App\Http\Controllers\Assets\Profile;
use App\Http\Controllers\Controller;

class Main extends Controller {

    public function __construct() {
        $parsedown = new Parsedown();
        $file = "files/dashboard/main.md";

        $profile = new Profile("Timothée", "Bazin");
        $profile->session_push();

        if (file_exists($file)) {
            return view("contents/dashboard/main", [
                "contents" => $parsedown->text(file_get_contents($file))
            ]);
        }

        abort(404);
    }

}
