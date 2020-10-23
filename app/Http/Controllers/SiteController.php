<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use App\Common\ErrorDef;
use App\Models\Seller;

class SiteController extends Controller
{
    /**
     * 登陆
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @param string $mobile   手机号
     * @param string $password 密码
     * 
     * @return array 
     */
    public function login(Request $request)
    {

        try {
            //判断当前用户是否已登陆,登陆过的直接跳转首页
            if (Auth::check()) {
                return Redirect::to('/shop/list', ErrorDef::REDIRECT);
            }
            //POST请求 - 处理登陆操作
            if ($request->isMethod('post')) {
                $input = [
                    'mobile' => $request->input('mobile'),
                    'password' => $request->input('password'),
                ];
                $validator = Validator::make(
                    $input,
                    [
                        'mobile' => 'required|mobile',
                        'password' => 'required',
                    ],
                    [
                        'mobile.required' => '请输入手机',
                        'mobile.mobile' => '请输入正确的手机格式',
                        'password.required' => '请输入密码',
                    ]
                );
                if ($validator->fails()) {
                    Log::error($validator->errors()->all()[0]);
                    return ErrorDef::retErr(ErrorDef::ERR_PARAM);
                }

                if (Auth::attempt($input)) {
                    return ErrorDef::retErr(ErrorDef::SUCCESS, '登录成功');
                }
                return ErrorDef::retErr(ErrorDef::SUCCESS, '登录成功');
            }
            //GET请求 - 渲染登陆页面
            return view('site.login');
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }

    /**
     * 退出
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login', ErrorDef::REDIRECT);
    }

    /**
     * 用户注册
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @param string $mobile   手机号
     * @param string $password 密码
     * 
     */
    public function register(Request $request)
    {
        try {
            if ($request->isMethod('post')) {

                $input = [
                    'sellername' => $request->input('mobile'),
                    'mobile' => $request->input('mobile'),
                    'password' => $request->input('password'),
                ];

                $validator = Validator::make(
                    $input,
                    [
                        'sellername' => 'required|max:15',
                        'mobile' => 'required|mobile',
                        'password' => 'required',
                    ],
                    [
                        'sellername.required' => '请输入用户名',
                        'sellername.max' => '用户名的长度不能超过15个字符',
                        'mobile.required' => '请输入手机号',
                        'mobile.mobile' => '请输入正确的手机格式',
                        'password.required' => '请输入密码',
                    ]
                );
                if ($validator->fails()) {
                    Log::error($validator->errors()->all()[0]);
                    return ErrorDef::retErr(ErrorDef::ERR_PARAM);
                }
            }
        } catch (Exception $e) {
        }
        if ($request->isMethod('post')) {
            try {
                $input = [
                    'sellername' => $request->input('mobile'),
                    'mobile' => $request->input('mobile'),
                    'password' => $request->input('password'),
                ];



                $validator = Validator::make($input, $rules, $messages);


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


    public function forget(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.forget');
        }
    }
}
