<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use App\Services\Brand\BrandService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AttachmentController extends Controller
{
    /**
     * 附件上传
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @param string $name   店铺名称
     * 
     * @return array 
     * 
     */
    public function upload(Request $request)
    {
    }

    /**
     * 获取附件列表
     *
     * @access public
     * 
     * @param string $shop_id 店铺ID
     * 
     * @return array 
     */
    public function lists(Request $request)
    {
        try {
        } catch (Exception $e) {
        }
    }
}
