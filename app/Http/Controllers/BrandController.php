<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;
use App\Services\Brand\BrandService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class BrandController extends Controller {
    /**
     * @name 获取分类列表
    */
    public function lists(Request $request) {
        if($request->isMethod('post')) {
            try {
                // if (\Auth::Check()) {
                //     return ['code' => 200, 'msg' => "登录成功"];
                // }

                $input = [
                    'cat_id' => (int) $request->input('cat_id'),
                    'page' => (int) $request->input('page'),
                ];

                $brandService = new BrandService();
                $res = $brandService->lists($input);
                if ($res['code'] != 200) {
                    return ['code' => 201, 'msg'=> $res['msg']];
                }
                
                return ['code' => 200, 'msg' => "succ", 'data' => $res['data']];

            } catch (ValidationException $validationException) {
                return ['code' => 201, 'msg' => "服务异常"];
            }
        }
        return view('brand.lists');
    }

    public function add(Request $request) {
        try {
            $input = [
                'name' => $request->input('cat_name'),
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
            ];

            $rules = [
                'name' => 'required|max:20',
            ];

            $messages = [
                'name.required' => '分类名称不能空',
                'name.max' => '分类名称不能超过20个字符',
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }

            $categoryService = new CategoryService();
            $res = $categoryService->create($input);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg'=> $res['msg']];
            }

            return ['code' => 200, 'msg' => '创建成功'];

        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function subadd(Request $request) {
        try {
            $input = [
                'pid'  => (int) $request->input('pid'),
                'name' => $request->input('cat_name'),
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
            ];

            $rules = [
                'pid' =>  'required',
                'name' => 'required|max:20',
            ];

            $messages = [
                'pid.required' => '父级分类数据异常',
                'name.required' => '分类名称不能空',
                'name.max' => '分类名称不能超过20个字符',
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }

            $categoryService = new CategoryService();
            $res = $categoryService->create($input);
            
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg'=> $res['msg']];
            }
            return ['code' => 200, 'msg' => '创建成功'];

        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function del(Request $request) {
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
                return ['code' => 201, 'msg'=> $res['msg']];
            }

            return ['code' => 200, 'msg' => '删除成功'];

        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function edit(Request $request) {
        try {
            $input = [
                'cat_id' => (int) $request->input('cat_id'),
                'name' => $request->input('cat_name'),
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
            ];

            $rules = [
                'cat_id' => 'required',
                'name' => 'required|max:20',
            ];

            $messages = [
                'cat_id.required' => '分类数据异常',
                'name.required' => '分类名称不能空',
                'name.max' => '分类名称不能超过20个字符',
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }

            $categoryService = new CategoryService();
            $res = $categoryService->edit($input);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg'=> $res['msg']];
            }

            return ['code' => 200, 'msg' => '更新成功'];

        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function get(Request $request) {
        $catId = (int) $request->input('cat_id');
        if ($catId <= 0) {
            return ['code' => 201, 'msg'=> '提交参数有错误', 'data' => []];
        }

        //获取店铺基本信息
        $categoryService = new CategoryService();
        $info = $categoryService->get($catId);
        if(empty($info)) {
            return ['code' => 201, 'msg'=> '没有找到相应的数据', 'data' => []];
        }

        return ['code' => 200, 'msg'=> 'suceess', 'data' => $info];
    }
}

