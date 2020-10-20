<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryService;
use App\Services\Attrsgroup\AttrsgroupService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AttrsGroupController extends Controller
{
    public function lists(Request $request)
    {

        return view('attrs.group');
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $input = [
                    'name' => $request->input('name'),
                    'cat_id' => (int) $request->input('cat_id'),
                ];
                $rules = [
                    'name' => 'required|max:20',
                    'cat_id' => 'required',
                ];
                $messages = [
                    'name.required' => '属性组名称不能空',
                    'name.max' => '属性组名称不能超过20个字符',
                    'cat_id.required' => '属性组分类不能为空',
                ];
                $validator = Validator::make($input, $rules, $messages);
                if ($validator->fails()) {
                    return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
                }

                $attrsGroupService = new AttrsgroupService();
                $res = $attrsGroupService->create($input);


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
            } catch (ValidationException $validationException) {
                return ['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()];
            }
        }
        $catId = $request->input('catid');
        if ($catId <= 0) {
            return redirect('/setting/product/category/select');
        }
        $categoryService = new CategoryService();
        $res = $categoryService->get($catId);
        // dd($res);
        if (empty($res[0]['cat_id']) || $res[0]['cat_id'] != $catId) {
            return redirect('/setting/product/category/select');
        }
        // dd($res);
        return view('attrs.groupadd', [
            'category' => $res[0],
        ]);
    }

    public function edit(Request $request)
    {
        return view('attrs.groupedit');
    }

    /**
     * @name del
     * @desc 删除
     */
    public function del(Request $request)
    {
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
