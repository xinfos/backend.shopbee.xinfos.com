<?php

namespace App\Services\Staff;

use App\Common\Library\ClientRequest;
use Exception;

class StaffService
{

    public $appService = "http://127.0.0.1:8082/";

    public function lists($data)
    {
        try {
            $apiUrl = $this->appService . 'backend/staff/list';
            $rst = ClientRequest::post($apiUrl, $data);
            if ($rst['code'] == 200) {
                return $rst['data'];
            }
            return [];
        } catch (Exception $e) {
            throw new Exception('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
        }
    }
}
