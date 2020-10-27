<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

use App\Services\Category\CategoryService;
use App\Services\Attrs\AttrService;
use App\Common\ErrorDef;

/**
 * 属性
 */
class AttrsController extends Controller
{
    public $service = null;

    public function __construct()
    {
        $this->service = new AttrService();
    }
    /**
     * 渲染创建属性页面
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @return 
     */
    public function add(Request $request)
    {
        return view('attrs.create');
    }

    /**
     * 创建属性
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param string $name      属性名称
     * @param int $fill_type    属性值填充类型 [1:选项框 | 2:文本框 | 3:单选框]
     * @param int $is_numeric   是否是数字类型参数 [1:是 | 2: 否]
     * @param int $is_searching 是否用于搜索过滤 [1:是 | 2: 否]
     * @param int $is_required  是否为必填属性 [1:是 | 2: 否]
     * @param string $unit      数字类型参数的单位
     * 
     * @return array
     */
    public function create(Request $request)
    {
        try {
            $input = [
                'name' => $request->input('name'),
                'fill_type' => (int) $request->input('fill_type'),
                'is_numeric' => (int) $request->input('is_numeric'),
                'is_searching' => (int) $request->input('is_searching'),
                'is_required' => (int) $request->input('is_required'),
                'unit' => $request->input('unit'),
            ];

            $validator = Validator::make(
                $input,
                [
                    'name' => 'required|max:10',
                ],
                [
                    'name.required' => '属性名称不能空',
                    'name.max' => '属性名称不能超过10个字符',
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

    /**
     * @name 删除具体属性ID
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $attr_id 属性ID
     * 
     * @return array
     */
    public function delete(Request $request)
    {
        try {
            $attrId = (int) $request->input('attr_id');
            if (empty($attrId)) {
                return ErrorDef::retErr(ErrorDef::ERR_PARAM);
            }
            return $this->service->delete($attrId);
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * @name 渲染编辑属性页面
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $attr_id 属性ID
     * 
     * @return
     */
    public function edit(Request $request)
    {
        $attrId = (int) $request->input('attr_id');
        if ($attrId <= 0) {
            throw new Exception('抱歉，没有找到对应的属性信息', 404);
        }
        $rst = $this->service->get($attrId);
        $data = [];
        if ($rst['code'] == 200) {
            $data = $rst['data'];
        }
        // dd($data);
        return view('attrs.edit', [
            'data' => $data,
        ]);
    }

    /**
     * 更新属性
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param int $attr_id      属性ID
     * @param string $name      属性名称
     * @param int $fill_type    属性值填充类型 [1:选项框 | 2:文本框 | 3:单选框]
     * @param int $is_numeric   是否是数字类型参数 [1:是 | 2: 否]
     * @param int $is_searching 是否用于搜索过滤 [1:是 | 2: 否]
     * @param int $is_required  是否为必填属性 [1:是 | 2: 否]
     * @param string $unit      数字类型参数的单位
     * 
     * @return array
     */
    public function update(Request $request)
    {
        try {
            $input = [
                'attr_id' => (int) $request->input('attr_id'),
                'name' => $request->input('name'),
                'fill_type' => (int) $request->input('fill_type'),
                'is_numeric' => (int) $request->input('is_numeric'),
                'is_searching' => (int) $request->input('is_searching'),
                'is_required' => (int) $request->input('is_required'),
                'unit' => $request->input('unit'),
            ];

            $validator = Validator::make(
                $input,
                [
                    'attr_id' => 'required',
                    'name' => 'required|max:10',
                ],
                [
                    'attr_id.required' => '属性ID不能为空',
                    'name.required' => '属性名称不能空',
                    'name.max' => '属性名称不能超过10个字符',
                ]
            );
            if ($validator->fails()) {
                Log::error($validator->errors()->all()[0]);
                return ErrorDef::retErr(ErrorDef::ERR_PARAM, $validator->errors()->all()[0]);
            }
            return $this->service->update($input);
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * @name 渲染属性列表页面
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * @param string $name  属性名称
     * @param int page 页数
     * 
     * @return
     */
    public function lists(Request $request)
    {
        $input = [
            'attr_name' => $request->input('name'),
            'page_no' => (int) $request->input('page'),
            'page_size' => 10,
        ];

        return view('attrs.lists', [
            'data' => $this->service->lists($input),
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
