<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Shop\ShopService;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Exception;


class WizardController extends Controller
{
    public $shopService = null;

    public function __construct()
    {
        $this->shopService = new ShopService();
    }

    /**
     * @name 选择店铺类型
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     */
    public function choose(Request $request)
    {
        if (!empty($this->shopService->getShopInfoBySellerID(Auth::user()->id))) {
            return Redirect::to('/shop/dashboard', 302);
        }
        return view('wizard.choose');
    }

    /**
     * @name 填写店铺信息
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     */
    public function info(Request $request)
    {
        if (!empty($this->shopService->getShopInfoBySellerID(Auth::user()->id))) {
            return Redirect::to('/shop/dashboard', 302);
        }
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
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     */
    public function success(Request $request)
    {
        if (!empty($this->shopService->getShopInfoBySellerID(Auth::user()->id))) {
            return Redirect::to('/shop/dashboard', 302);
        }
        return view('wizard.success');
    }
}
