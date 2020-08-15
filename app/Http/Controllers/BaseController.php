<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function __construct()
    {
        // var_dump(Auth::user());exit;
        // if (!Auth::check()) {
        //     redirect('/login')->send();
        // }
    }
}
