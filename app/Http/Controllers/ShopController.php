<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class ShopController extends Controller {
    public function dashboard() {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}