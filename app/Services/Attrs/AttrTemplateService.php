<?php

namespace App\Services\Attrs;

use App\Common\Library\ClientRequest;
use Exception;

class AttrTemplateService
{

    public $appService = "http://127.0.0.1:8082/backend/attrs/template";

    public function create($data)
    {
        try {
            $apiUrl = $this->appService . '/create';
            $rst = ClientRequest::post($apiUrl, $data);
            if (empty($rst['code'])) {
                return ['code' => 201, 'msg' => '请求失败'];
            }
            return $rst;
        } catch (Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    public function delete($catId)
    {
        try {
            $data = [
                'cat_id' => (int) $catId,
            ];
            $apiUrl = $this->appService . '/delete';
            $rst = ClientRequest::post($apiUrl, $data);
            if (empty($rst['code'])) {
                return ['code' => 201, 'msg' => '请求失败'];
            }
            return $rst;
        } catch (Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    public function edit($data)
    {
        try {
            $apiUrl = $this->appService . '/update';
            $rst = ClientRequest::post($apiUrl, $data);
            if (empty($rst['code'])) {
                return ['code' => 201, 'msg' => '请求失败'];
            }
            return $rst;
        } catch (Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }

    public function get($brandId)
    {
        try {
            $data = [
                'brand_id' => (int) $brandId,
            ];
            $apiUrl = $this->appService . '/get';
            $rst = ClientRequest::post($apiUrl, $data);
            if ($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }
}
