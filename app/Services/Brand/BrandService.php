<?php

namespace App\Services\Brand;

use App\Common\Library\ClientRequest;
use Exception;

class BrandService {
    
    public $appService = "http://127.0.0.1:8085";
    
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

    public function delete($catId) {
        try {
            $data = [
                'cat_id' => (int) $catId,
            ];
            $apiUrl = $this->appService. '/v1/category/delete';
            $rst = ClientRequest::post($apiUrl, $data);
            if(empty($rst['code'])) {
                return ['code' => 201, 'msg' => '请求失败'];
            }
            return $rst;
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    public function edit($data) {
        try {
            $apiUrl = $this->appService. '/v1/category/update';
            $rst = ClientRequest::post($apiUrl, $data);
            if(empty($rst['code'])) {
                return ['code' => 201, 'msg' => '请求失败'];
            }
            return $rst;
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    public function get($catId) {
        try {
            $data = [
                'cat_id' => (int) $catId,
            ];
            $apiUrl = $this->appService. '/v1/category/get';
            $rst = ClientRequest::post($apiUrl, $data);
            if($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }
    
    public function lists($data) {
        try {
            $apiUrl = $this->appService. '/v1/brand/list';
            $rst = ClientRequest::post($apiUrl, $data);
            if (empty($rst['code'])) {
                return ['code' => 201, 'msg' => '系统繁忙', 'data' => []];
            }
            return $rst;
        } catch(Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }
}
?>