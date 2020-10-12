<?php

namespace App\Http\Controllers;

use App\Services\Attrs\AttrTemplateService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttrTemplateController extends BaseController
{
    public function add(Request $request)
    {
        try {
            $input = [
                'name' => $request->input('name'),
                'cat_id' => (int) $request->input('cat_id'),
                'state' => (int) $request->input('state'),
                'attrgroups' => $request->input('attrgroups'),
            ];
            $rules = [
                'name' => 'required|max:30',
                'cat_id' => 'required',
            ];
            $messages = [
                'name.required' => '模板组名称不能空',
                'name.max' => '模板名称不能超过30个字符',
                'cat_id.required' => '分类不能为空',
            ];
            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
            }

            $attrTemplateService = new AttrTemplateService();
            $res = $attrTemplateService->create($input);
            dd($res);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg' => $res['msg']];
            }
            return [
                'code' => 200,
                'msg' => '创建成功',
                'data' => [
                    'group_id' => $res['data'][0]['group_id']
                ]
            ];
        } catch (\Exception $exception) {
            return ['code' => 201, 'msg' => $exception->getMessage()];
        }
    }
}
