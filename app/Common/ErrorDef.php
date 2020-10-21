<?php

namespace App\Common;

/**
 * API调用返回响应码
 * Class ErrorDef
 * @package App\Common
 */
class ErrorDef
{

    const SUCCESS                   = 200;
    const REDIRECT                  = 301;
    const ERR_UNLOGIN               = 401;
    const ERR_AUTH                  = 403;
    const ERR_SERVER                = 500;
    const ERR_PARAM                 = 100401;
    const ERR_PARAM_EMPTY           = 100402;
    const ERR_VALIDATION            = 100403;
    const ERR_VERIFY_SIGN           = 100404;
    const ERR_ACCESS_OVER_FREQUENCY = 100405;
    const ERR_REMOTE                = 100406;
    const ERR_SIGN_TYPE             = 100408;
    const ERR_SIGN_APP_ID           = 100409;

    public static $ERROR_MSGS = [
        self::SUCCESS             => 'success',
        self::REDIRECT            => '重定向',
        self::ERR_UNLOGIN         => '用户未登录',
        self::ERR_AUTH            => '权限错误',
        self::ERR_SERVER          => '服务器未知错误',
        self::ERR_PARAM           => '参数错误',
        self::ERR_PARAM_EMPTY     => '参数为空',
        self::ERR_VALIDATION      => '参数校验失败',
        self::ERR_VERIFY_SIGN     => '验签失败',
        self::ERR_ACCESS_OVER_FREQUENCY => '访问过于频繁',
        self::ERR_REMOTE          => '请求失败',
        self::ERR_SIGN_TYPE       => '错误的签名类型',
        self::ERR_SIGN_APP_ID     => '错误的签名AppId',
    ];

    public static function getErrorMsg($code)
    {
        $msg = isset(static::$ERROR_MSGS[$code]) ?  static::$ERROR_MSGS[$code] : '';
        return $msg;
    }

    public static function retErr($code, $msg = '')
    {
        $err = ['code' => $code, 'msg' => $msg, 'data' => []];
        if (empty($err['msg'])) {
            $err['msg'] = self::getErrorMsg($code);
        }
        return $err;
    }
}
