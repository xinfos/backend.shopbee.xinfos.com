<?php

namespace App\Services\User;

use App\Common\Library\ClientRequest;
use Exception;

class UserService
{

    public $appService = "http://127.0.0.1:8085";

    public function getUserInfoByMobile($mobile)
    {
        try {
            $data = [
                'mobile' => $mobile,
            ];
            $apiUrl = $this->appService . '/v1/seller/getbymobile';
            $rst = ClientRequest::post($apiUrl, $data);
            if (empty($rst['code'])) {
                return ['code' => 201, 'msg' => '服务繁忙'];
            }
            return $rst;
        } catch (Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }
}
