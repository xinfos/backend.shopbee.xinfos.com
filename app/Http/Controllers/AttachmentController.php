<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use App\Services\Brand\BrandService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AttachmentController extends Controller {

    public function lists(Request $request) {
        try {
            // if (\Auth::Check()) {
            //     return ['code' => 200, 'msg' => "登录成功"];
            // }

            $input = [
                'g_id' => (int) $request->input('g_id'),
                'page' => (int) $request->input('page'),
            ];

        

            $brandService = new BrandService();
            $res = $brandService->lists($input);
            if ($res['code'] != 200) {
                return ['code' => 201, 'msg'=> $res['msg']];
            }
            
            return ['code' => 200, 'msg' => "succ", 'data' => $res['data']];

        } catch (ValidationException $validationException) {
            return ['code' => 201, 'msg' => "服务异常"];
        }
    }
}

