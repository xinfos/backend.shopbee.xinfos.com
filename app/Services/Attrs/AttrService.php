<?php

namespace App\Services\Attrs;

use App\Common\Library\ClientRequest;
use Exception;

class AttrService
{

    public $appService = "http://127.0.0.1:8082/backend/attr";

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
    /**
     * @name delete
     * @description 根据属性ID，删除单个属性
     * @author Alex Pan <psj474@163.com>
     * @param $attrId int 属性ID
     * @return array
     */
    public function delete($attrId)
    {
        try {
            $data = [
                'attr_id' => (int) $attrId,
            ];
            $apiUrl = $this->appService . '/delete';
            $rst = ClientRequest::post($apiUrl, $data);
            if (!empty($rst['code']) && $rst['code'] == 200 && !empty($rst['data'])) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return [];
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

    /**
     * @name 根据属性ID，获取单个属性详情
     * @author Alex Pan <psj474@163.com>
     * @param $attrId int 属性ID
     * @return array
     */
    public function get($attrId)
    {
        try {
            $data = [
                'attr_id' => (int) $attrId,
            ];
            $apiUrl = $this->appService . '/get';
            $rst = ClientRequest::post($apiUrl, $data);
            if (!empty($rst['code']) && $rst['code'] == 200 && !empty($rst['data'])) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return [];
        }
    }

    /**
     * @name 获取属性列表
     * @author Alex Pan <psj474@163.com>
     * @param $data array 查询条件参数
     * @return array
     */
    public function lists($data)
    {
        try {
            $apiUrl = $this->appService . '/list';
            if(empty($data['page_no'])) {
                $data['page_no'] = 1;
            }
            $rst = ClientRequest::post($apiUrl, $data);
            if (!empty($rst['code']) && $rst['code'] == 200 && !empty($rst['data'])) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return [];
        }
    }

    /**
     * @name 查询属性
     * @author Alex Pan <psj474@163.com>
     * @param $data array 查询条件参数
     * @return array
     */
    public function query($data)
    {
        try {
            $apiUrl = $this->appService . '/query';
            $rst = ClientRequest::post($apiUrl, $data);
            if (!empty($rst['code']) && $rst['code'] == 200 && !empty($rst['data'])) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return [];
        }
    }
}
