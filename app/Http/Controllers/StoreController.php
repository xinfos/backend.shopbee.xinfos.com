<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class StoreController extends Controller {
    /**
     * @name 商家地址库
    */
    public function lists() {
        return view('store.lists');
    }

    /**
     * @name 新增地址库 
    */
    public function add() {
        return view('store.add');
    }

    /**
     * @name 编辑商家地址库
    */
    public function edit() {
        return view('store.edit');
    }

    /**
     * @name 删除商家地址库
    */
    public function delete() {

    }
}