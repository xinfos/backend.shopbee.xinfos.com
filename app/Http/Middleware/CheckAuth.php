<?php

namespace App\Http\Middleware;

use Closure;

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
        if (!\Auth::check()) {
            // 以json格式返回
            return redirect('/seller/login');
            return response()->json(['msg' => '没登录']);

            // 返回登陆界面
            // return redirect()->route('login.index');
        }
        return $next($request);
    }
}