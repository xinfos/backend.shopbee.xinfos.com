<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Exception;

use App\Services\Shop\ShopService;

class ShopController extends Controller
{
    public $service = null;

    public function __construct()
    {
        $this->service = new ShopService();
    }

    /**
     * 创建店铺
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @param string $name   店铺名称
     * @param int $type      店铺类型
     * @param string $desc   店铺描述
     * 
     * @return array 
     * 
     */
    public function create(Request $request)
    {
        try {
            $input = [
                'seller_id' => Auth::user()->id,
                'name' => $request->input('name'),
                'location' => $request->input('city'),
                'address' => $request->input('address'),
                'type' => (int) $request->input('type'),
                'desc' => $request->input('desc'),
                'is_agree' => (int) $request->input('is_agree'),
                'version' => 1,
                'state' => 1
            ];
            $rules = [
                'seller_id' => 'required',
                'name' => 'required|max:15',
                'type' => 'required',
                'location' => 'required',
                'address' => 'required',
                'is_agree' => 'required',
            ];
            $messages = [
                'seller_id.required' => '用户信息有误',
                'name.required' => '店铺名称有误',
                'name.max' => '店铺名称长度不能超过15个字符',
                'type.required' => '店铺类型有误',
                'location.required' => '请填写具体的所在地',
                'address.required' => '请填写具体详细地址',
                'is_agree.required' => '请阅读并同意相关条例',
            ];
            // dd($input);
            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                Log::error($validator->errors()->all()[0]);
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }

            $rst = $this->service->create($input);

            return $rst;
        } catch (Exception $e) {
        }
    }

    /**
     * @name 删除/注销店铺
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @param int $shop_id 店铺ID
     * 
     * @return array
     */
    public function delete(Request $request)
    {
        try {
            $shopId = (int)$request->input('shop_id');
            if ($shopId <= 0) {
            }
            $data = $this->service->delete($shopId, Auth::user()->id);
            dd($data);
        } catch (Exception $e) {
        }
    }

    /**
     * 店铺概况
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
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
     * 店铺列表
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     */
    public function lists()
    {
        try {
            //获取卖家店铺列表信息，并判断当前用户是否已经拥有店铺，则直接跳转
            $lists = $this->service->lists(Auth::id());
            if (!empty($lists['list'][0])) {
                // return Redirect::to('/shop/dashboard', 302);
            }

            return view('shop.lists', [
                'lists' => $lists,
            ]);
        } catch (Exception $e) {
            Log::error("shop.lists, exception: " . $e->getMessage());
        }
    }

    /**
     * 店铺详情
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     */
    public function info()
    {
        try {
            //获取店铺基本信息
            $data = $this->service->getShopInfoBySellerID(Auth::id());
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
}
