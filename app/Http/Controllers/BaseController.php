<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function __construct()
    {
        // var_dump(\Auth::Check());
        // exit;
        // if(!Auth::check()){
        //     // return redirect()->action('SiteController@login');
        //     redirect('/login')->send();
        //     // return redirect()->route('login');
        // }
    }
}
