<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

use App\Services\Attrs\AttrTemplateService;
use App\Services\Category\CategoryService;
use App\Common\ErrorDef;

class AttrTemplateController extends Controller
{
    public $service = null;

    public function __construct()
    {
        $this->service = new AttrTemplateService();
    }

    /**
     * 渲染新建属性模板页
     * 
     * @author Alex Pan <psj474@163.com>
     *
     * @access public
     * 
     * @return array
     */
    public function add(Request $request)
    {
        $catId = $request->input('cat_id');
        if ($catId <= 0) {
            return redirect('/setting/product/category/select?md=attrstemplateadd');
        };

        $categoryService = new CategoryService();
        $rst = $categoryService->get($catId);
        dd($rst);
        if (empty($res[0]['cat_id']) || $res[0]['cat_id'] != $catId) {
            return redirect('/setting/product/category/select');
        }
        // dd($res);
        return view('attrstemplate.create', [
            // 'category' => $res[0],
        ]);
    }

    public function create(Request $request)
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

    /**
     * 渲染属性模板列表页
     * 
     * @author Alex Pan <psj474@163.com>
     *
     * @access public
     * @param $method int 分类ID
     * 
     * @return array
     */
    public function lists()
    {
        return view('attrstemplate.lists', []);
    }
}
