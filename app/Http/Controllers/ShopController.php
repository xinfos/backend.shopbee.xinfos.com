<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Services\Shop\ShopService;

use Exception;

class ShopController extends BaseController {
    
    /**
     * @name 店铺概况
    */
    public function dashboard() {

        $sellerId = Auth::user()->id;

        //获取店铺基本信息
        $shopService = new ShopService();
        $info = $shopService->GetShopInfo(1, $sellerId);
        if(empty($info)) {
            throw new Exception("抱歉，我们并没有找到相应的店铺信息，请重新选择~.", 404);
        }

        return view('shop.dashboard', [
            'info' => $info
        ]);
    }

    public function lists() {

        $sellerId = Auth::user()->id;

        //获取店铺列表基本信息
        $shopService = new ShopService();
        $lists = $shopService->GetShopList($sellerId);
        
        return view('shop.lists', [
            'lists' => $lists
        ]);
    }



    /**
     * @name 店铺详情
    */
    public function info() {
        $sellerId = Auth::user()->id;
        

        return view('shop.info');
    }

    public function infoEdit() {
        return view('shop.info_edit');
    }

    public function wizard() {
        return view('wizard.wizard');
    }
}