<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
    /**
     * @name 获取分类列表
    */
    public function list() {
        
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function detail() {
        
    }

    
}