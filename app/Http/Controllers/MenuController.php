<?php
namespace App\Http\Controllers;


use App\Models\Seller;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class MenuController extends Controller {
    public function Get(Request $request) {
        try {
            if (!\Auth::Check()) {
                return ['code' => 201, 'msg' => "请重新登录"];
            }

            $data = [
                [
                    'menu_id'    => 1100,
                    'menu_pid'   => 0,
                    'menu_title' => '店铺',
                    'menu_icon'  => 'fe fe-home',
                    'menu_addr'  => '#',
                    'is_menu'    => 1,
                    'sub_menu'   =>  [
                        [
                            'menu_id'    => 1101,
                            'menu_pid'   => 1100,
                            'menu_title' => '店铺',
                            'menu_icon'  => 'fe fe-shopping-bag',
                            'menu_addr'  => '#',
                            'is_menu'    => 1,
                            'sub_menu'   => [],
                        ]
                    ]
                ],[
                    'menu_id'    => 1200,
                    'menu_pid'   => 0,
                    'menu_title' => '商品',
                    'menu_icon'  => 'fe fe-shopping-bag',
                    'menu_addr'  => '#',
                    'is_menu'    => 1,
                    'sub_menu'   =>  [
                        [
                            'menu_id'    => 1201,
                            'menu_pid'   => 1200,
                            'menu_title' => '商品管理',
                            'menu_icon'  => 'fe fe-shopping-bag',
                            'menu_addr'  => '#',
                            'is_menu'    => 1,
                            'sub_menu'   => [
                                'menu_id'    => 12011,
                                'menu_pid'   => 1201,
                                'menu_title' => '商品库',
                                'menu_icon'  => 'fe fe-shopping-bag',
                                'menu_addr'  => '#',
                                'is_menu'    => 1,
                                'sub_menu'   => [],
                            ],
                        ],
                    ]
                ]
            ];

            return ['code' => 200, 'msg' => "succ", 'data' => $data];

        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => "服务异常"];
        }
    }
}