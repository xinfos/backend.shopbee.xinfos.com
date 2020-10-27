<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

use App\Services\Attrs\AttrsgroupService;
use App\Services\Category\CategoryService;
use App\Common\ErrorDef;


class AttrsGroupController extends Controller
{
    public $service = null;

    public function __construct()
    {
        $this->service = new AttrsgroupService();
    }

    /**
     * 渲染创建属性组页面
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $cat_id 父级分类ID
     * 
     * @return
     */
    public function add(Request $request)
    {
        // $catId = $request->input('cat_id');
        // if ($catId <= 0) {
        //     throw new Exception('11', 404);
        //     return redirect('/setting/product/category/select?md=attrsgroupadd');
        // };
        // $categoryService = new CategoryService();
        // $res = $categoryService->get($catId);
        // // dd($res);
        // if (empty($res[0]['cat_id']) || $res[0]['cat_id'] != $catId) {
        //     return redirect('/setting/product/category/select');
        // }
        // // dd($res);
        return view('attrs.groupadd', [
            // 'category' => $res[0],
        ]);
    }

    /**
     * 创建属性组
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $pid         父级分类ID
     * @param string $name     分类名称
     * 
     * @return array
     */
    public function create(Request $request)
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
    }



    public function lists(Request $request)
    {
        return view('attrs.group');
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
