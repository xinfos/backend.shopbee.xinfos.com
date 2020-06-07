<?php

namespace App\Services\Product;

use App\Common\Library\ClientRequest;
use Exception;

class ProductService {
    
    public $appService = "http://127.0.0.1:8082";
    
    public function getProductProps($data) {
        try {
            $apiUrl = $this->appService. '/backend/category/props';
            $rst = ClientRequest::post($apiUrl, $data);
            if(empty($rst['code'])) {
                return ['code' => 201, 'msg' => '请求失败'];
            }
            return $rst;
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    public function create($data) {
        try {
            $apiUrl = $this->appService. '/v1/category/create';
            $rst = ClientRequest::post($apiUrl, $data);
            if(empty($rst['code'])) {
                return ['code' => 201, 'msg' => '请求失败'];
            }
            return $rst;
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }
}
?>