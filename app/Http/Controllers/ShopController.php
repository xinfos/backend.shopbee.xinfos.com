<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\Shop\ShopService;
use Exception;

class ShopController extends Controller
{
    public $service = null;

    public function __construct() {
        $this->service = new ShopService();
    }

    /**
     * @name 店铺概况
     */
    public function dashboard()
    {
        try {
            //获取店铺基本信息
            $data = $this->service->dashboard(Auth::id());
            if (empty($data['info'])) {
                throw new Exception("抱歉，我们并没有找到相应的店铺信息，请重新选择~.", 404);
            }
            // dd($data);
            return view('shop.dashboard', [
                'data' => $data,
            ]);
            
        } catch(Exception $e) {
            log.error("shop.dashboard, exception: ".$e->getMessage());
        }
    }

    /**
     * @name 店铺列表
    */
    public function lists()
    {
        try {
            $sellerId = Auth::id();
            $shopService = new ShopService();
            //获取店铺列表基本信息
            $lists = $shopService->lists($sellerId);
            return view('shop.lists', [
                'lists' => $lists,
            ]);
        } catch (Exception $e) {
            log.error("shop.lists, exception: ".$e->getMessage());
        }
    }

    /**
     * @name 店铺详情
     */
    public function info()
    {
        try {
            //获取店铺基本信息
            $shopService = new ShopService();
            $data = $shopService->info(Auth::id());
            // dd($data);
            if (empty($data)) {
                throw new Exception("抱歉，我们并没有找到相应的店铺信息，请重新选择~.", 404);
            }
            return view('shop.info', [
                'data' => $data,
            ]);
        } catch (Exception $e) {
            log.error("shop.info, exception: ".$e->getMessage());
        }
    }
}
