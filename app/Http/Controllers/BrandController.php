<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;


use App\Services\Brand\BrandService;
use App\Services\Category\CategoryService;
use App\Common\ErrorDef;

/**
 * 品牌管理
 */
class BrandController extends Controller
{
    public $service = null;

    public function __construct()
    {
        $this->service = new BrandService();
    }

    /**
     * @name 创建品牌
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param string $brand_name  品牌名称
     * @param string $cn_name     品牌中文名称
     * @param string $en_name     品牌英文名称
     * @param string $brand_logo  品牌Logo
     * @param string $brand_desc  品牌描述
     * @param int $displayorder   品牌在前台页面的显示顺序
     * @param int $is_show        品牌是否显示
     * 
     * @return array
     */
    public function create(Request $request)
    {
        try {
            $input = [
                'brand_name' => $request->input('brand_name'),
                'cn_name' => $request->input('cn_name'),
                'en_name' => $request->input('en_name'),
                'brand_logo' => $request->input('brand_logo'),
                'brand_desc' => $request->input('brand_desc'),
                'displayorder' => $request->input('displayorder'),
                'is_show' => $request->input('is_show'),

            ];
            $validator = Validator::make(
                $input,
                [
                    'brand_name,cn_name,en_name' => 'required|max:20',
                    'brand_logo' => 'required|max:225'
                ],
                [
                    'brand_name.required' => '品牌名称不能空',
                    'brand_name.max' => '品牌名称不能超过20个字符',
                    'cn_name.required' => '品牌中文名称不能空',
                    'cn_name.max' => '品牌中文名称不能超过20个字符',
                    'en_name.required' => '品牌英文名称不能空',
                    'en_name.max' => '品牌英文名称不能超过20个字符',
                    'brand_logo.required' => '品牌Logo不能空',
                    'brand_logo.max' => '品牌Logo地址非法',
                ]
            );
            dd($input);
            if ($validator->fails()) {
                Log::error($validator->errors()->all()[0]);
                return ErrorDef::retErr(ErrorDef::ERR_PARAM, $validator->errors()->all()[0]);
            }
            return $this->service->create($input);
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    public function del(Request $request)
    {
        try {
            $input = [
                'cat_id' => (int) $request->input('cat_id'),
            ];

            $rules = [
                'cat_id' => 'required',
            ];

            $messages = [
                'cat_id.required' => '分类数据异常',
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }

            $categoryService = new CategoryService();
            $res = $categoryService->delete($input['cat_id']);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg' => $res['msg']];
            }

            return ['code' => 200, 'msg' => '删除成功'];
        } catch (Exception $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            return false;
        }
        $brandId = (int) $request->input('id');
        if ($brandId <= 0) {
        }
        $data = [];
        $brandService = new BrandService();
        $data = $brandService->get($brandId);
        if (empty($data[0])) {
            throw new Exception("没有找到", 404);
        }
        return view('brand.edit', ['data' => $data[0]]);
    }

    /**
     * 获取品牌列表
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $page 页数
     * @param string $name 品牌名称
     * 
     * @return array
     */
    public function lists(Request $request)
    {
        $data = [];
        $rst = $this->service->lists(
            [
                "page_no" => (int) $request->input('page'),
                "page_size" => 10,
            ]
        );
        if ($rst['code'] == 200) {
            $data = $rst['data'];
        }

        return view('brand.lists', [
            'data' => $data
        ]);
    }

    public function get(Request $request)
    {
        $catId = (int) $request->input('cat_id');
        if ($catId <= 0) {
            return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
        }

        //获取店铺基本信息
        $categoryService = new CategoryService();
        $info = $categoryService->get($catId);
        if (empty($info)) {
            return ['code' => 201, 'msg' => '没有找到相应的数据', 'data' => []];
        }

        return ['code' => 200, 'msg' => 'suceess', 'data' => $info];
    }
}
