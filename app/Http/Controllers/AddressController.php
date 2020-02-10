<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class AddressController extends Controller {
    /**
     * @name 商家地址库
    */
    public function lists() {
        return view('address.lists');
    }

    /**
     * @name 新增地址库 
    */
    public function add() {
        return view('address.add');
    }

    /**
     * @name 编辑商家地址库
    */
    public function edit() {
        return view('address.edit');
    }

    /**
     * @name 删除商家地址库
    */
    public function delete() {

    }
}