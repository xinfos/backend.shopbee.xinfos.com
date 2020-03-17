<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Services\Staff\StaffService;
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
           
        }
        return view('staff.lists');
    }

    public function getStaffList(Request $request) {
        try {
            $input = [
                's_id'  => (int) $request->input('sid'),
                'name'  => (string) $request->input('account'),
                'state' => (int) $request->input('state'),
                'page'  => (int) $request->input('page', 1),
            ];

    
   
            return ['code' => 200, 'data'=> $data, 'count' => 43];

            $staffService = new StaffService();
            $res = $staffService->lists($input);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg'=> $res['msg']];
            }
            
            return ['code' => 200, 'msg' => "succ", 'data' => $res['data']];

        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => "服务异常"];
        }
    }
}