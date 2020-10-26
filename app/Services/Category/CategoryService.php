<?php

namespace App\Services\Category;

use Illuminate\Support\Facades\Log;
use Exception;

use App\Common\Library\ClientRequest;
use App\Common\ErrorDef;

class CategoryService
{

    public $appService = "http://127.0.0.1:8082/backend/category";

    /**
     * @name 创建分类
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $pid         父级分类ID
     * @param string $name     分类名称
     * @param string $alias    分类别名名称
     * @param string $desc     分类描述
     * @param int $is_show     分类是否展示
     * @param int $state       分类状态
     * @param int $is_parent   分类是否为父级分类
     * @param int $show_in_nav 分类是否需要在前台展示
     * 
     * @return array
     */
    public function create($data)
    {
        try {
            $apiUrl = $this->appService . '/create';
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
     * @name 删除分类
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $cat_id 分类ID
     * 
     * @return array
     */
    public function delete($catId)
    {
        try {
            $params = [
                'cat_id' => (int) $catId,
            ];
            $apiUrl = $this->appService . '/delete';
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
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    public function get($catId)
    {
        try {
            $data = [
                'cat_id' => (int) $catId,
            ];
            $apiUrl = $this->appService . '/get';
            $rst = ClientRequest::post($apiUrl, $data);
            if ($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 获取子分类列表
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $pid 父级分类ID
     * 
     * @return array
     */
    public function sub($pid)
    {
        try {
            $params = [
                'cat_id' => (int) $pid,
            ];
            $apiUrl = $this->appService . '/sub';
            $rst = ClientRequest::post($apiUrl, $params);
            if (!empty($rst['code']) && $rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 查询分类信息
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $pid 父级分类ID
     * 
     * @return array
     */
    public function Query($params)
    {
        try {
            $apiUrl = $this->appService . '/list';
            $rst = ClientRequest::post($apiUrl, $params);
            if (!empty($rst['code']) && $rst['code'] == 200) {
                return $rst['data'];
            }
            return [
                'list' => [],
                'current_page_no' => 1,
                'current_page_size' => 20,
                'total_count' => 0
            ];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    public function Search($data)
    {
        try {
            $apiUrl = $this->appService . 'category/search';
            $rst = ClientRequest::post($apiUrl, $data);
            if ($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }


    public function getAttrsMaps($catId)
    {
        try {
            $data = [
                'cat_id' => (int) $catId,
            ];
            $apiUrl = $this->appService . 'category/attrs/get';
            $rst = ClientRequest::post($apiUrl, $data);
            if ($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }
}
