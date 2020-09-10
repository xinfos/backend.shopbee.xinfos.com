<?php
namespace App\Http\Controllers;

use App\Services\Category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AttrsGroupController extends BaseController
{
    public function lists(Request $request) {
        
        return view('attrs.group');
    }
    
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            try {
                $input = [
                    'name' => $request->input('cat_name'),
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
        return view('attrs.groupadd');
    }

    public function edit(Request $request) {
        return view('attrs.groupedit');
    }

    /**
     * @name del
     * @desc 删除
    */
    public function del(Request $request) {
        try {
            $input = [
                'template_id' => (int)$request->input('template_id'),
            ];
            $rules = [
                'template_id' => 'required',
            ];
            $messages = [
                'template_id.required' => '模板不存在',
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
            return ['code' => 200, 'msg' => '删除成功'];
        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }
}