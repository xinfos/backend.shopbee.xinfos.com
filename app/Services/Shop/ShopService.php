<?php

namespace App\Services\Shop;

use App\Common\Library\ClientRequest;
use Exception;

class ShopService {
    
    public $appService = "http://127.0.0.1:8082/backend/shop";
    /**
     * 根据卖家ID、店铺ID获取单店详情
     * 
     * @author Alex Pan <psj474@163.com>
     * @param $sellerId int 卖家ID
     * 
     * @return array
    */
    public function dashboard($sellerId) {
        try {
            $params = [
                'seller_id' => (int) $sellerId,
            ];
            $apiUrl = $this->appService. '/dashboard';
            $rst = ClientRequest::post($apiUrl, $params);
            if(empty($rst['code']) || $rst['code'] != 200) {
                return [];
            }
            return $rst['data'];
        } catch (Exception $e) {
            Log::error("获取店铺详情异常:[".$e->getMessage()."]");
            return [];
        }
    }
    
    /**
     * 根据卖家ID、店铺ID获取单店详情
     * 
     * @author Alex Pan <psj474@163.com>
     * @param $shopId int 店铺ID
     * @param $sellerId int 卖家ID
     * 
     * @return array
    */
    public function get($shopId, $sellerId) {
        try {
            $params = [
                'seller_id' => (int) $sellerId,
                'shop_id' => (int) $shopId,
            ];
            $apiUrl = $this->appService. '/get';
            $rst = ClientRequest::post($apiUrl, $params);
            if(empty($rst['code']) || $rst['code'] != 200) {
                return [];
            }
            return $rst['data'];
        } catch (Exception $e) {
            Log::error("获取店铺详情异常:[".$e->getMessage()."]");
            return [];
        }
    }
    

    /**
     * 根据卖家ID获取店铺详情
     * 
     * @author Alex Pan <psj474@163.com>
     * @param $sellerId int 卖家ID
     * 
     * @return array
    */
    public function info($sellerId) {
        try {
            $params = [
                'seller_id' => (int) $sellerId,
            ];
            $apiUrl = $this->appService. '/info';
            $rst = ClientRequest::post($apiUrl, $params);
            if(empty($rst['code']) || $rst['code'] != 200) {
                return [];
            }
            return $rst['data'];
        } catch (Exception $e) {
            Log::error("获取店铺详情异常:[".$e->getMessage()."]");
            return [];
        }
    }

    /**
     * 根据卖家ID获取店铺列表
     * 
     * @author Alex Pan <psj474@163.com>
     * @param $sellerId int 卖家ID
     * @param $pageNo int 页数
     * @param $pageSize int 每页显示个数
     * @return array
    */
    public function lists($sellerId, $pageNo = 1, $pageSize = 20) {
        try {
            $params = [
                'seller_id' => (int) $sellerId,
                'page_no' => (int) $pageNo,
                'page_size' => (int) $pageSize
            ];
            $apiUrl = $this->appService. '/list';
            $rst = ClientRequest::post($apiUrl, $params);
            if(empty($rst['code']) || $rst['code'] != 200) {
                return [];
            }
            return $rst['data'];
        } catch (Exception $e) {
            Log::error("获取店铺列表异常:[".$e->getMessage()."]");
            return [];
        }
    }

}

?>