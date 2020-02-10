<?php

namespace App\Services\Shop;

use App\Common\Library\ClientRequest;
use Exception;

class ShopService {
    
    public $appService = "http://127.0.0.1:8184";
    
    public function GetShopInfo($sid, $sellerId) {
        try {
            $data = [
                'sid' => (int) $sid,
                'seller_id' => (int) $sellerId,
            ];
            $apiUrl = $this->appService. '/v1/shop/get';
            $rst = ClientRequest::post($apiUrl, $data);
            if($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    public function GetShopList($sellerId) {
        try {
            $data = [
                'seller_id' => (int) $sellerId,
            ];
            $apiUrl = $this->appService. '/v1/shop/list';
            $rst = ClientRequest::post($apiUrl, $data);
            if($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    
}

?>