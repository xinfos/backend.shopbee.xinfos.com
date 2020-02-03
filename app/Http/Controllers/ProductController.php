<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
    public function index() {
        var_dump(11);exit;
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}