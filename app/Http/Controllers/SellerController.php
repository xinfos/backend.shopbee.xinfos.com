<?php

namespace App\Http\Controllers;


use App\Models\Seller;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;


class SellerController extends Controller
{

    public function register(Request $request)
    {
        if (!\Auth::Check()) {
            return view('auth.register');
        }
        return redirect('/shop/list');
    }

    public function doRegister(Request $request)
    {
        if (\Auth::Check()) {
            return json_encode(['code' => 200, 'msg' => 'success']);
        }
        try {
            $input = [
                'sellername' => $request->input('username'),
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
                return json_encode(['code' => 201, 'msg' => $validator->errors()->all()[0]]);
            }


            $seller = new Seller();
            $seller->seller_name = $input['sellername'];
            $seller->mobile = $input['mobile'];
            $seller->password = bcrypt($input['password']);

            $seller->save();

            return json_encode(['code' => 200, 'msg' => 'success']);
        } catch (ValidationException $validationException) {
            return json_encode(['code' => 201, 'msg' => $validationException->validator->getMessageBag()->first()]);
        }
    }

    public function registerSuccess(Request $request)
    {
        if (!\Auth::Check()) {
            return view('auth.register_succ');
        }
        return redirect('/shop/dashboard');
    }

    public function login(Request $request)
    {
        if (!\Auth::Check()) {
            return view('auth.login');
        }
        return redirect('/shop/dashboard');
    }

    public function doLogin(Request $request)
    {
        if (\Auth::Check()) {
            return json_encode(['code' => 200, 'msg' => 'success']);
        }
        $input = [
            'mobile' => $request->input('mobile'),
            'password' => $request->input('password')
        ];

        $rules = [
            'mobile' => 'required|mobile',
            'password' => 'required'
        ];

        \Auth::logout();

        // 自定义消息
        $messages = [
            'mobile.required' => '请输入手机',
            'mobile.mobile' => '请输入正确的手机格式',
            'password.required' => '请输入密码'
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return json_encode(['code' => 201, 'msg' => $validator->errors()->all()[0]]);
        }

        if (\Auth::attempt($input)) {
            return json_encode(['code' => 200, 'msg' => 'succ']);
        }
        return json_encode(['code' => 201, 'msg' => '当前账号不存在']);
    }

    public function forget(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.forget');
        }
    }

    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect('/seller/login');
    }
}
