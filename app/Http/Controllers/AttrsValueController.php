<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttrsValueController extends Controller
{

    public function create(Request $request)
    {
        try {
            $input = [
                'value' => $request->input('value'),
            ];
            $rules = [
                'value' => 'required|max:20',
            ];
            $messages = [
                'value.required' => '分类名称不能空',
                'value.max' => '分类名称不能超过20个字符',
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }
            // $categoryService = new CategoryService();
            // $res = $categoryService->create($input);
            $res['code'] = 200;
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg' => $res['msg']];
            }
            return ['code' => 200, 'msg' => '创建成功'];
        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
        }
    }
}
