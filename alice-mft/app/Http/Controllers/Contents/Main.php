<?php

namespace App\Http\Controllers\Contents;

use App\Http\Controllers\Controller;

class Main extends Controller {

    public function __construct() {
        return view("contents/main");
    }

}
