<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class StaffController extends Controller {
    /**
     * @name 员工列表
    */
    public function lists() {
        return view('staff.lists');
    }

    public function add() {
        return view('staff.add');
    }
}

