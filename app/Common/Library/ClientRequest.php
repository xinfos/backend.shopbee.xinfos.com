<?php
namespace App\Common\Library;

use Illuminate\Support\Facades\Log;

class ClientRequest
{

    public static $_timeout = 3;

    public static $_connectTimeout = 5;

    public static $_appId = "shop_bee_backend";

    public static $_appSecret = "491edf5857297952ff26";

    public $_contentJSONType = 1;

    public static function post($url, $params = array(), $auth = [], $isReturn = true)
    {
        $startTime = microtime(true);
        $paramsForLog = static::prepareParametersForLog($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, static::$_timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, static::$_connectTimeout);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //是否需要头部 Authorization
        if (!empty($auth)) {
            $header = [
                'Authorization: Bearer ' . $auth,
                'Content-Type: application/json;charset=utf-8',
                'Content-Length: ' . strlen($jsonStr)
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        if (!empty($params)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }

        $rst = curl_exec($ch);
        curl_close($ch);
        $endTime = microtime(true);
        static::logServiceDebug($url, $paramsForLog, $rst);
        static::logServiceCost($startTime, $endTime);

        return self::parseResult($rst);
    }

    public static function get($url)
    {
        $ch = curl_init();
        $header[] = 'Content-Type: application/x-www-form-urlencoded;charset=utf-8';
        curl_setopt($ch, CURLOPT_URL, $url); //定义请求地址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // 要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); //定义请求类型
        curl_setopt($ch, CURLOPT_HEADER, 0); //定义是否显示状态头 1：显示 ； 0：不显示
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $res = curl_exec($ch);
        curl_close($ch);//关闭

        return self::parseResult($res);
    }

    private static function getSignature($params) {
        ksort($params);
        $paramsString = "";
        foreach($params as $k => $v) {
            $paramsString .= $k . $v ;
        }
        return strtolower(md5(self::$_appId . $paramsString . self::$_appSecret));
    }

    private static function parseResult($respJson) {
        return json_decode($respJson, true);
    }

    private static function logServiceDebug($url, $parametersToLog, $ret)
    {
        Log::debug('call service result, url: ' . $url . ', parameters: ' . $parametersToLog . ', result: ' . $ret);
    }

    private static function prepareParametersForLog($parameters)
    {
        return json_encode($parameters, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    private static function logServiceCost($startTime, $endTime)
    {
        $cost = round(($endTime - $startTime) * 1000);
        Log::debug('Call Service Cost: ' . $cost . ' ms');
    }
}
