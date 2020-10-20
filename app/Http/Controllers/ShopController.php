<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\Services\Shop\ShopService;

use Exception;


class ShopController extends Controller
{
    public $service = null;

    public function __construct()
    {
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
            return view('shop.dashboard', [
                'data' => $data,
            ]);
        } catch (Exception $e) {
            Log::error("shop.dashboard, exception: " . $e->getMessage());
        }
    }

    /**
     * @name 店铺列表
     * 
     *  @author Alex Pan <psj474@163.com>
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
            Log::error("shop.lists, exception: " . $e->getMessage());
        }
    }

    /**
     * @name 店铺详情
     * 
     * @author Alex Pan <psj474@163.com>
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
            Log::error("shop.info, exception: " . $e->getMessage());
        }
    }
    /**
     * @name 创建店铺
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @param $name string  店铺名称
     * @param $type int     店铺类型
     * @param $desc string  店铺描述
     * 
     * @return array 
     */
    public function create(Request $request)
    {
        try {
            $input = [
                'seller_id' => Auth::user()->id,
                'name' => $request->input('name'),
                'version' => 1,
                'type' => $request->input('type'),
                'desc' => $request->input('desc'),
                'state' => 1
            ];
            $rules = [
                'seller_id' => 'required',
                'name' => 'required|max:15',
                'type' => 'required'
            ];
            $messages = [
                'seller_id.required' => '用户信息有误',
                'name.required' => '店铺名称有误',
                'name.max' => '店铺名称长度不能超过15个字符',
                'type.required' => '店铺类型有误',
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                Log::error($validator->errors()->all()[0]);
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }
            dd($input);
            return $this->service->create($input);
        } catch (Exception $e) {
        }
    }
}
