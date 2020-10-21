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
    public function add(Request $request)
    {
        try {
            $input = [
                'name' => $request->input('cat_name'),
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
            ];
            $validator = Validator::make(
                $input,
                [
                    'name' => 'required|max:20'
                ],
                [
                    'name.required' => '分类名称不能空',
                    'name.max' => '分类名称不能超过20个字符',
                ]
            );
            if ($validator->fails()) {
                Log::error($validator->errors()->all()[0]);
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }
            return $this->service->create($input);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * @name 获取分类列表
     */
    public function lists(Request $request)
    {
        $data = [];
        try {
            $input = [
                "page_no" => (int) $request->input('page'),
                "page_size" => 8,
            ];

            $brandService = new BrandService();
            $res = $brandService->lists($input);
            if ($res['code'] == 200) {
                $data = $res['data'][0];
            }
        } catch (Exception $e) {
        }
        // dd($data);
        return view('brand.lists', ['data' => $data]);
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
