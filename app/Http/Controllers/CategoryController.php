<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

use App\Services\Category\CategoryService;
use App\Common\ErrorDef;

class CategoryController extends Controller
{
    public $service = null;

    public function __construct()
    {
        $this->service = new CategoryService();
    }

    /**
     * 创建分类
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $pid         父级分类ID
     * @param string $name     分类名称
     * @param string $alias    分类别名名称
     * @param string $desc     分类描述
     * @param int $is_show     分类是否展示
     * @param int $state       分类状态
     * @param int $is_parent   分类是否为父级分类
     * @param int $show_in_nav 分类是否需要在前台展示
     * 
     * @return array
     */
    public function add(Request $request)
    {
        try {
            $input = [
                'user_id' => (int) Auth::user()->id,
                'pid' => (int) $request->input('pid'),
                'name' => $request->input('cat_name'),
                'alias' => $request->input('cat_alias'),
                'desc' => $request->input('cat_desc'),
                'is_show' => (int) $request->input('is_show'),
                'state' => (int) $request->input('state'),
                'is_parent' => 0,
                'show_in_nav' => 0,
            ];
            $validator = Validator::make(
                $input,
                [
                    'name' => 'required|max:20',
                    'pid' => 'required',
                ],
                [
                    'name.required' => '分类名称不能空',
                    'name.max' => '分类名称不能超过20个字符',
                    'pid.required' => '没有选择父级分类',
                ]
            );
            if ($validator->fails()) {
                Log::error($validator->errors()->all()[0]);
                return ErrorDef::retErr(ErrorDef::ERR_PARAM, $validator->errors()->all()[0]);
            }

            return $this->service->create($input);
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
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

    /**
     * @name 删除分类
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $cat_id 分类ID
     * 
     * @return array
     */
    public function delete(Request $request)
    {
        try {
            $catId =  (int) $request->input('cat_id');
            if ($catId <= 0) {
                return ErrorDef::retErr(ErrorDef::ERR_PARAM, '抱歉，删除失败，没有找到对应的分类信息!~');
            }
            return $this->service->delete($catId);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ['code' => 201, 'msg' => '内部服务错误'];
        }
    }

    /**
     * @name 渲染编辑分类信息页面
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $id 分类ID
     * 
     * @throws Exception 常规的异常
     * 
     * @return array
     */
    public function edit(Request $request)
    {
        $catId = (int) $request->input('id');
        if ($catId <= 0) {
            throw new Exception("抱歉，没有找到对应的分类信息!~", 404);
        }
        $data = $this->service->get($catId);
        if (empty($data)) {
            throw new Exception("抱歉，没有找到对应的分类信息!~", 404);
        }
        return view('category.edit', ['data' => $data]);
    }

    /**
     * @name 编辑分类信息
     * 
     * @method POST 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $pid         父级分类ID
     * @param string $name     分类名称
     * @param string $alias    分类别名名称
     * @param string $desc     分类描述
     * @param int $is_show     分类是否展示
     * @param int $state       分类状态
     * @param int $is_parent   分类是否为父级分类
     * @param int $show_in_nav 分类是否需要在前台展示
     * 
     * @return array
     */
    public function update(Request $request)
    {
        try {
            $input = [
                'cat_id' => (int) $request->input('cat_id'),
                'pid' => (int) $request->input('pid'),
                'name' => $request->input('cat_name'),
                'alias' => $request->input('alias'),
                'desc' => $request->input('desc'),
                'show_in_nav' => 0,
                'is_show' => 0,
                'state' => (int) $request->input('state')
            ];

            $validator = Validator::make(
                $input,
                [
                    'cat_id' => 'required',
                    'name' => 'required|max:20',
                ],
                [
                    'cat_id.required' => '分类数据异常',
                    'name.required' => '分类名称不能空',
                    'name.max' => '分类名称不能超过20个字符',
                ]
            );
            if ($validator->fails()) {
                Log::error($validator->errors()->all()[0]);
                return ErrorDef::retErr(ErrorDef::ERR_PARAM, $validator->errors()->all()[0]);
            }
            return $this->service->edit($input);
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 获取分类列表
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param $name string 分类名称
     * 
     * @throws Exception 常规的异常
     * @return array
     */
    public function lists(Request $request)
    {
        try {
            $input = [
                'name' => trim($request->input('name')),
                'page_no' => 1
            ];
            $data = [];
            if (!empty($input['name'])) {
                $rst = $this->service->query($input);
                if (!empty($rst['list'])) {
                    $data = $rst['list'];
                }
            } else {
                $data = $this->service->sub(10000);
            }
            return view('category.lists', [
                'data' => $data,
            ]);
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 获取子分类列表
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param $cat_id string 父级分类ID
     * 
     * @return array
     */
    public function sub(Request $request)
    {
        try {
            $catId = (int) $request->input('cat_id');
            if ($catId <= 0) {
                return ErrorDef::retErr(ErrorDef::ERR_PARAM);
            }
            return ErrorDef::retErr(ErrorDef::SUCCESS, '', $this->service->sub($catId));
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 根据分类ID，获取当个分类详情
     * 
     * @author Alex Pan <psj474@163.com>
     *
     * @access public
     * @param $cat_id int 分类ID
     * 
     * @return array
     */
    public function get(Request $request)
    {
        try {
            $catId = (int) $request->input('cat_id');
            if ($catId <= 0) {
                return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
            }
            return $this->service->get($catId);
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 分类选择器
     * 
     * @author Alex Pan <psj474@163.com>
     *
     * @access public
     * @param $method int 分类ID
     * 
     * @return array
     */
    public function search(Request $request)
    {
        $input = [
            'keyword' => trim($request->input('keyword')),
        ];
        if (empty($input['keyword'])) {
            return ['code' => 201, 'msg' => '提交参数有错误', 'data' => []];
        }
        //获取店铺基本信息
        $categoryService = new CategoryService();
        $item = $categoryService->Search($input);
        dd($item);
        if (empty($item[0])) {
            return ['code' => 201, 'msg' => '没有找到相应的数据', 'data' => []];
        }
        return ['code' => 200, 'msg' => 'suceess', 'data' => $item[0]];
    }

    /**
     * 分类选择器
     * 
     * @author Alex Pan <psj474@163.com>
     *
     * @access public
     * @param $method int 分类ID
     * 
     * @return array
     */
    public function select(Request $request)
    {
        $m = trim($request->input('md'));
        $referSupportMethods = [
            'attrstemplateadd' => [
                'title' => '新建属性模板',
                'redirect_url' => '/setting/product/attrstemplate/add'
            ],
            'attrstemplateedit' => [
                'title' => '编辑属性模板',
                'redirect_url' => '/setting/product/attrstemplate/edit'
            ],
        ];

        if (empty($referSupportMethods[$m])) {
            throw new Exception("抱歉，您访问的页面不见了", 404);
        }

        return view('category.select', [
            'data' => $referSupportMethods[$m]
        ]);
    }
}
