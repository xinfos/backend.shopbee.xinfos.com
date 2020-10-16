<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Services\Attrs\AttrService;

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

    public function del(Request $request)
    {
        try {
            $attrId = (int) $request->input('id');
            if (empty($attrId)) {
                return ['code' => 201, 'msg' => 'fail', 'data' => []];
            }
            $attrService = new AttrService();
            return $attrService->delete($attrId);
        } catch (\Exception $exception) {
            return ['code' => 201, 'msg' => "fail"];
        }
    }

    /**
     * @name 编辑单个属性信息
     * @author Alex Pan <psj474@163.com>
     * @param $name string 属性名称
     * @return array
     */
    public function edit(Request $request)
    {
        $attrId = (int) $request->input('id');
        if ($attrId <= 0) {
            return false;
        }
        $attrService = new AttrService();
        $attrInfo = $attrService->get($attrId);
        // dd($attrInfo);
        if (empty($attrInfo)) {
            return false;
        }

        //如果 {POST-请求} 直接编辑相关属性
        if ($request->isMethod('post')) {
            return ['code' => 200, 'msg' => 'succ', 'data' => []];
        }

        return view('attrs.edit', [
            'data' => $attrInfo,
        ]);
    }

    /**
     * @name 获取属性列表
     * @author Alex Pan <psj474@163.com>
     * @param $name string 属性名称
     * @return array
     */
    public function lists(Request $request)
    {
        $input = [
            'attr_name' => $request->input('name'),
            'page_no' => (int) $request->input('page'),
            'page_size' => 10,
        ];
        $attrService = new AttrService();
        return view('attrs.lists', [
            'data' => $attrService->lists($input),
        ]);
    }

    public function query(Request $request)
    {
        try {
            $input = [
                'search' => $request->input('search'),
            ];
            if (empty($input['search'])) {
                return ['code' => 200, 'msg' => 'succ', 'data' => []];
            }
            $attrService = new AttrService();
            return ['code' => 200, 'msg' => 'succ', 'data' => $attrService->query($input)];
        } catch (\Exception $exception) {
            return ['code' => 201, 'msg' => $exception->getMessage()];
        }
    }
}
