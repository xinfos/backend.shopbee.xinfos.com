<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // var_dump(1);exit;
        if (!Auth::check()) {

            // 以json格式返回
            // return redirect('/login');
            // return response()->json(['msg' => '没登录']);

            // 返回登陆界面
            // return redirect()->route('login.index');
        }
        return $next($request);
    }
}
