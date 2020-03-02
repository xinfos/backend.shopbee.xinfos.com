<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;
use App\Services\Brand\BrandService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class StaffController extends Controller {
    /**
     * @name 员工列表
    */
    public function lists(Request $request) {
        if($request->isMethod('post')) {
            try {
                // if (\Auth::Check()) {
                //     return ['code' => 200, 'msg' => "登录成功"];
                // }

                $input = [
                    's_id' => (int) $request->input('s_id'),
                    'page' => (int) $request->input('page'),
                ];

                // $staffService = new StaffService();
                // $res = $staffService->lists($input);
                if ($res['code'] != 200) {
                    return ['code' => 201, 'msg'=> $res['msg']];
                }
                
                return ['code' => 200, 'msg' => "succ", 'data' => $res['data']];

            } catch (ValidationException $validationException) {
                return ['code' => 201, 'msg' => "服务异常"];
            }
        }
        return view('staff.lists');
    }

    public function add() {
        // $input = [
        //     'add'
        // ];
    }
}