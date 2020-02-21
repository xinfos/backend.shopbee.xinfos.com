<?php
namespace App\Http\Controllers;


use App\Models\Seller;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;


class SiteController extends Controller {
    
    public function register(Request $request) {
        if($request->isMethod('post')) {
            try {
                $input = [
                    'sellername' => $request->input('mobile'),
                    'mobile' => $request->input('mobile'),
                    'password' => $request->input('password'),
                ];

                $rules = [
                    'sellername' => 'required|max:15',
                    'mobile' => 'required|mobile',
                    'password' => 'required'
                ];
                $messages = [
                    'sellername.required' => '请输入用户名',
                    'sellername.max' => '用户名的长度不能超过15个字符',
                    'mobile.required' => '请输入手机号',
                    'mobile.mobile' => '请输入正确的手机格式',
                    'password.required' => '请输入密码'
                ];

                $validator = Validator::make($input, $rules, $messages);
                if ($validator->fails()) {
                    return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
                }

                $userService = new UserService();
                $res = $userService->getUserInfoByMobile($input['mobile']);
                if ($res['code'] == 200) {
                    return ['code' => 201, 'msg' => '手机号已经存在'];
                }

                $seller = new Seller();
                $seller->name = $input['sellername'];
                $seller->mobile = $input['mobile'];
                $seller->password = bcrypt($input['password']);
                
                $seller->save();

                return ['code' => 200, 'msg' => '注册成功'];

            } catch (ValidationException $validationException) {
                return ['code' => 201, 'msg' => "服务异常"];
            }
        }
        return view('site.register');
    }
    
    public function login(Request $request) {
       
        if($request->isMethod('post')) {
            try {
                if (\Auth::Check()) {
                    return ['code' => 200, 'msg' => "登录成功"];
                }
                \Auth::logout();

                $input = [
                    'mobile' => $request->input('mobile'),
                    'password' => $request->input('password')
                ];
                $rules = [
                    'mobile' => 'required|mobile',
                    'password' => 'required'
                ];
                $messages = [
                    'mobile.required' => '请输入手机',
                    'mobile.mobile' => '请输入正确的手机格式',
                    'password.required' => '请输入密码'
                ];

                $validator = Validator::make($input, $rules, $messages);
                if ($validator->fails()) {
                    return ['code' => 201, 'msg' => $validator->errors()->all()[0]];
                }

                if (\Auth::attempt($input)) {
                    return ['code' => 200, 'msg' => "登录成功"];
                }

                return ['code' => 201, 'msg' => "当前账号不存在"];

            } catch (ValidationException $validationException) {
                return ['code' => 201, 'msg' => "服务异常"];
            }
        }
        return view('site.login');
    }
    
    public function forget(Request $request) {
        if($request->isMethod('get')) {
            return view('auth.forget');
        }
    }

    public function logout(Request $request) {
        \Auth::logout();
        return redirect('/seller/login');
    }
}