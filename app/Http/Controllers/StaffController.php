<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Exception;

use App\Services\Staff\StaffService;

/**
 * 员工管理
 */
class StaffController extends Controller
{

    /**
     * 员工列表
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @param string $name   店铺名称
     * @param int $type      店铺类型
     * @param string $desc   店铺描述
     * 
     * @return array 
     * 
     */
    public function lists(Request $request)
    {
        try {
            $input = [];
        } catch (Exception $e) {
        }
        $input = [
            'shop_id'  => (int) $request->input('sid', 1),
            'name'  => (string) $request->input('name', ''),
            'mobile'  => (string) $request->input('mobile', ''),
            'state' => (int) $request->input('state', 0),
            'page'  => (int) $request->input('page', 1),
        ];

        $staffService = new StaffService();
        $data = $staffService->lists($input);

        return view('staff.lists', [
            'data' => $data
        ]);
    }
}
