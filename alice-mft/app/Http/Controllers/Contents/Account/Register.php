<?php

namespace App\Http\Controllers\Contents\Account;

use App\Http\Controllers\Controller;

class Register extends Controller {

    public function __construct() {
        return view("contents/account/register");
    }

}

