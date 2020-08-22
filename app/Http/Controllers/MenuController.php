<?php
namespace App\Http\Controllers;


use App\Models\Seller;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class MenuController extends BaseController {
    public function Get(Request $request) {
        try {
            if (!\Auth::Check()) {
                return ['code' => 201, 'msg' => "请重新登录"];
            }

            $data = [
                [
                    'menu_id'    => 1100,
                    'menu_pid'   => 0,
                    'title' => '店铺',
                    'menu_icon'  => 'fe fe-home',
                    'menu_addr'  => '/shop/dashboard',
                    'is_menu'    => 1,
                    'sub_menu'   =>  [
                        [
                            'menu_id'    => 1101,
                            'menu_pid'   => 1100,
                            'title' => '店铺信息',
                            'menu_icon'  => 'fe fe-shopping-bag',
                            'menu_addr'  => '#',
                            'is_menu'    => 1,
                            'sub_menu'   => [
                                [
                                    'menu_id'    => 11011,
                                    'menu_pid'   => 1101,
                                    'title' => '店铺概况',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/shop/dashboard',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [],
                                ],
                                [
                                    'menu_id'    => 11011,
                                    'menu_pid'   => 1101,
                                    'title' => '店铺信息',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/shop/info',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [],
                                ],
                            ],
                        ],
                        [
                            'menu_id'    => 1102,
                            'menu_pid'   => 1100,
                            'title' => '店铺管理',
                            'menu_icon'  => 'fe fe-shopping-bag',
                            'menu_addr'  => '#',
                            'is_menu'    => 1,
                            'sub_menu'   => [
                                [
                                    'menu_id'    => 11021,
                                    'menu_pid'   => 1102,
                                    'title' => '员工管理',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/shop/staff/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [
                                        [
                                            'menu_id'    => 110211,
                                            'menu_pid'   => 11021,
                                            'title' => '添加新员工',
                                            'menu_icon'  => 'fe fe-shopping-bag',
                                            'menu_addr'  => '/shop/staff/add',
                                            'is_menu'    => 1,
                                            'sub_menu'   => [],
                                        ],
                                    ],
                                ],
                                [
                                    'menu_id'    => 11023,
                                    'menu_pid'   => 1102,
                                    'title' => '门店管理',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/shop/store/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [
                                        [
                                            'menu_id'    => 110231,
                                            'menu_pid'   => 11023,
                                            'title' => '新建门店',
                                            'menu_icon'  => 'fe fe-shopping-bag',
                                            'menu_addr'  => '/shop/store/add',
                                            'is_menu'    => 1,
                                            'sub_menu'   => [],
                                        ],
                                    ],
                                ],
                                [
                                    'menu_id'    => 11024,
                                    'menu_pid'   => 1102,
                                    'title' => '商家地址',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/shop/address/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [
                                        [
                                            'menu_id'    => 110241,
                                            'menu_pid'   => 11024,
                                            'title' => '新建地址',
                                            'menu_icon'  => 'fe fe-shopping-bag',
                                            'menu_addr'  => '/shop/address/add',
                                            'is_menu'    => 1,
                                            'sub_menu'   => [],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ]
                ],[
                    'menu_id'    => 1200,
                    'menu_pid'   => 0,
                    'title' => '商品',
                    'menu_icon'  => 'fe fe-shopping-bag',
                    'menu_addr'  => '/product/list',
                    'is_menu'    => 1,
                    'sub_menu'   =>  [
                        [
                            'menu_id'    => 1201,
                            'menu_pid'   => 1200,
                            'title' => '商品管理',
                            'menu_icon'  => 'fe fe-shopping-bag',
                            'menu_addr'  => '#',
                            'is_menu'    => 1,
                            'sub_menu'   => [
                                [
                                    'menu_id'    => 12011,
                                    'menu_pid'   => 1201,
                                    'title' => '商品库',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/product/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [
                                        [
                                            'menu_id'    => 120111,
                                            'menu_pid'   => 12011,
                                            'title' => '新建商品',
                                            'menu_icon'  => 'fe fe-shopping-bag',
                                            'menu_addr'  => '/product/create',
                                            'is_menu'    => 1,
                                            'sub_menu'   => [],
                                        ],
                                        [
                                            'menu_id'    => 120112,
                                            'menu_pid'   => 12011,
                                            'title' => '商品发布',
                                            'menu_icon'  => 'fe fe-shopping-bag',
                                            'menu_addr'  => '/product/add',
                                            'is_menu'    => 1,
                                            'sub_menu'   => [],
                                        ],
                                    ],
                                ],
                                [
                                    'menu_id'    => 12012,
                                    'menu_pid'   => 1201,
                                    'title'      => '商品分类',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/product/category/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [],
                                ],
                                [
                                    'menu_id'    => 12013,
                                    'menu_pid'   => 1201,
                                    'title'      => '品牌管理',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/product/brand/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [],
                                ],
                                [
                                    'menu_id'    => 12014,
                                    'menu_pid'   => 1201,
                                    'title'      => '商品属性',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/product/attrs/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [],
                                ],
                                [
                                    'menu_id'    => 12015,
                                    'menu_pid'   => 1201,
                                    'title'      => '商品属性组',
                                    'menu_icon'  => 'fe fe-shopping-bag',
                                    'menu_addr'  => '/product/attrsgroup/list',
                                    'is_menu'    => 1,
                                    'sub_menu'   => [],
                                ],
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