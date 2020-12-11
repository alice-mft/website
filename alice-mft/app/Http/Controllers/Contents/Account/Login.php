<?php

namespace App\Http\Controllers\Contents\Account;

use App\Http\Controllers\Controller;

class Login extends Controller {

    public function __construct() {
        return view("contents/account/login");
    }

}
