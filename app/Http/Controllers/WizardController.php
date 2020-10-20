<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Services\Shop\ShopService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Exception;

class WizardController extends Controller
{

    /**
     * @name 选择店铺类型
     */
    public function choose(Request $request)
    {
        return view('wizard.choose');
    }

    /**
     * @name 填写店铺信息
     */
    public function info(Request $request)
    {
        $input = [
            "type"    => (int) $request->input('type'),
            "version" => (int) $request->input('version'),
            "cat_id"  => (int) $request->input('cat'),
        ];

        //判断当前店铺是否正确
        if (empty(ShopService::$availableTypeOfShop[$input['type']])) {
            throw new Exception("抱歉，您选择的店铺，不正确");
        }

        return view('wizard.info', [
            'data' => $input
        ]);
    }

    /**
     * @name 店铺创建成功页
     * 
     */
    public function success(Request $request)
    {
        return view('wizard.success');
    }
}
