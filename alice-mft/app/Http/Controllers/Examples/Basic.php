<?php

namespace App\Http\Controllers\Examples;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Basic extends Controller {

    public function __construct() {
        return view("examples/basic");
    }

}
