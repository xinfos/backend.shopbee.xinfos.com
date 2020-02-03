<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller 
{
    /**
     * 显示给用户的概要文件.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        var_dump(11);exit;
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}


?>