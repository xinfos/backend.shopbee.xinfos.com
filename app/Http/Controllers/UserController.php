<?php
namespace App\Http\Controllers;

use App\User;

class UserController extends BaseController
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
