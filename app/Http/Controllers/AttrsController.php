<?php
namespace App\Http\Controllers;

use App\Services\Category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AttrsController extends BaseController
{

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
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
                    return ['code' => 201, 'msg' => $res['msg']];
                }
                return ['code' => 200, 'msg' => '创建成功'];
            } catch (ValidationException $validationException) {
                return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
            }
        }
        return view('attrs.create');
    }

    public function add(Request $request) {
        try {
            $input = [
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
                'name' => $request->input('name'),
                'unit' => $request->input('unit'),
                'is_required' => (int) $request->input('is_required'),
                'is_search' => (int) $request->input('is_search'),
                'fill_type' => (int) $request->input('fill_type'),
                'state' => (int) $request->input('state'),
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
            // $categoryService = new CategoryService();
            // $res = $categoryService->create($input);
            // if ($res['code'] != 200) {
            //     return ['code' => 201, 'msg' => $res['msg']];
            // }
            return ['code' => 200, 'msg' => '创建成功', 'data'=> $input];
        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }

    public function lists(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $input = [
                    'cat_id' => $request->input('cat_id'),
                    'page' => $request->input('page', 1),
                    'pageSize' => $request->input('pageSize', 30),
                ];
                $input['cat_id'] = 10003;
                $categoryService = new CategoryService();
                $res = $categoryService->getAttrsMaps($input['cat_id']);
                echo "<pre>";
                print_r($res);
                exit;
                return ['code' => 200, 'msg' => '创建成功'];
            } catch (ValidationException $validationException) {
                return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
            }
        }
        return view('attrs.lists');
    }
}
