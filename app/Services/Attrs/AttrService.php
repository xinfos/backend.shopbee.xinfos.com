<?php

namespace App\Services\Attrs;


use Illuminate\Support\Facades\Log;
use Exception;

use App\Common\Library\ClientRequest;
use App\Common\ErrorDef;

class AttrService
{

    public $appService = "http://127.0.0.1:8082/backend/attr";

    /**
     * 创建属性
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param string $name      属性名称
     * @param int $fill_type    属性值填充类型 [1:选项框 | 2:文本框 | 3:单选框]
     * @param int $is_numeric   是否是数字类型参数 [1:是 | 2: 否]
     * @param int $is_searching 是否用于搜索过滤 [1:是 | 2: 否]
     * @param int $is_required  是否为必填属性 [1:是 | 2: 否]
     * @param string $unit      数字类型参数的单位
     * 
     * @return array
     */
    public function create($params)
    {
        try {
            $apiUrl = $this->appService . '/create';
            $rst = ClientRequest::post($apiUrl, $params);
            if (empty($rst['code'])) {
                return ErrorDef::retErr(ErrorDef::ERR_REMOTE);
            }
            return $rst;
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }
    /**
     * 根据属性ID，删除单个属性
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
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
            if (empty($rst['code'])) {
                return ErrorDef::retErr(ErrorDef::ERR_REMOTE);
            }
            return $rst;
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 更新属性
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $attr_id      属性ID
     * @param string $name      属性名称
     * @param int $fill_type    属性值填充类型 [1:选项框 | 2:文本框 | 3:单选框]
     * @param int $is_numeric   是否是数字类型参数 [1:是 | 2: 否]
     * @param int $is_searching 是否用于搜索过滤 [1:是 | 2: 否]
     * @param int $is_required  是否为必填属性 [1:是 | 2: 否]
     * @param string $unit      数字类型参数的单位
     * 
     * @return array
     */
    public function update($data)
    {
        try {
            $apiUrl = $this->appService . '/update';
            $rst = ClientRequest::post($apiUrl, $data);
            if (empty($rst['code'])) {
                return ErrorDef::retErr(ErrorDef::ERR_REMOTE);
            }
            return $rst;
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
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
            if (empty($rst['code'])) {
                return ErrorDef::retErr(ErrorDef::ERR_REMOTE);
            }
            return $rst;
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
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
            if (empty($data['page_no'])) {
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
