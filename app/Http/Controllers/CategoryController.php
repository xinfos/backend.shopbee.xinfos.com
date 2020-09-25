<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CategoryController extends BaseController
{
    /**
     * @name 获取分类列表
     */
    public function lists(Request $request)
    {
        $name = trim($request->input('name'));
        $categoryService = new CategoryService();
        $data = [];
        if (!empty($name)) {
            $res = $categoryService->query(['name' => $name, 'page_no' => 1]);
            if (!empty($res[0]['list'])) {
                $data = $res[0]['list'];
            }
        } else {
            $res = $categoryService->sub(10000);
            if (!empty($res[0])) {
                $data = $res[0];
            }
        }
        return view('category.lists', [
            'data' => $data,
        ]);
    }

    public function add(Request $request)
    {
        try {
            $input = [
                'pid' => (int) $request->input('pid'),
                'name' => $request->input('cat_name'),
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
                'is_show' => (int) $request->input('is_show'),
                'state' => (int) $request->input('state'),
                'is_parent' => 0,
                'show_in_nav' => 0,
            ];

            $rules = [
                'name' => 'required|max:20',
                'pid' => 'required',
            ];

            $messages = [
                'name.required' => '分类名称不能空',
                'name.max' => '分类名称不能超过20个字符',
                'pid.required' => '没有选择父级分类',
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }
            $categoryService = new CategoryService();
            $res = $categoryService->create($input);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg' => $res['msg']];
            }

            return ['code' => 200, 'msg' => '创建成功'];
        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function subadd(Request $request)
    {
        try {
            $input = [
                'pid' => (int) $request->input('pid'),
                'name' => $request->input('cat_name'),
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
            ];

            $rules = [
                'pid' => 'required',
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
                return ['code' => 201, 'msg' => $res['msg']];
            }
            return ['code' => 200, 'msg' => '创建成功'];
        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function del(Request $request)
    {
        try {
            $catId =  (int) $request->input('cat_id');
            if ($catId <= 0) {
                return ['code' => 201, 'msg' => "抱歉，删除失败，没有找到对应的分类信息!~"];
            }

            $categoryService = new CategoryService();
            $res = $categoryService->delete($catId);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg' => $res['msg']];
            }
            return ['code' => 200, 'msg' => '删除成功'];
        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
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
                    return ['code' => 201, 'msg' => $res['msg']];
                }

                return ['code' => 200, 'msg' => '更新成功'];
            } catch (Exception $validationException) {
                return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
            }
        }
        $catId = (int) $request->input('id');
        if ($catId <= 0) {
            return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
        }
        $categoryService = new CategoryService();
        $data = $categoryService->get($catId);
        if (empty($data[0])) {
            return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
        }
        // dd($data[0]);
        return view('category.edit', ['data' => $data[0]]);
    }

    public function get(Request $request)
    {
        $catId = (int) $request->input('cat_id');
        if ($catId <= 0) {
            return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
        }
        $categoryService = new CategoryService();
        $info = $categoryService->get($catId);
        if (empty($info)) {
            return ['code' => 201, 'msg' => '没有找到相应的数据', 'data' => []];
        }

        return ['code' => 200, 'msg' => 'suceess', 'data' => $info];
    }

    public function sub(Request $request)
    {
        $catId = (int) $request->input('cat_id');
        if ($catId <= 0) {
            return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
        }
        //获取店铺基本信息
        $categoryService = new CategoryService();
        $info = $categoryService->sub($catId);
        if (empty($info[0])) {
            return ['code' => 201, 'msg' => '没有找到相应的数据', 'data' => []];
        }
        return ['code' => 200, 'msg' => 'suceess', 'data' => $info[0]];
    }

    public function attrs(Request $request)
    {
        $catId = (int) $request->input('cat_id');
        if ($catId <= 0) {
            return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
        }
        //获取店铺基本信息
        $categoryService = new CategoryService();

        $item = $categoryService->getAttrsMaps($catId);

        if (empty($item[0])) {
            return ['code' => 201, 'msg' => '没有找到相应的数据', 'data' => []];
        }
        return ['code' => 200, 'msg' => 'suceess', 'data' => $item[0]];
    }
}
