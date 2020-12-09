<?php

namespace App\Http\Controllers\Examples;

use App\Http\Controllers\Controller;

class Article extends Controller {

    public function __construct() {
        return view("examples/article");
    }

}
