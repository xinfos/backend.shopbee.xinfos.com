<?php

namespace App\Services\Attachment;

use Illuminate\Support\Facades\Log;
use Exception;

use App\Common\Library\ClientRequest;
use App\Common\ErrorDef;

class AttachmentService
{
    public $appService = "http://127.0.0.1:8082/backend/attachment";

    /**
     * 获取附件列表
     *
     * @access public
     * 
     * @param string $sellerId 卖家ID
     * 
     * @return array 
     */
    public function lists($sellerId)
    {
        try {
            $params = [
                'seller_id' => $sellerId,
            ];
            $apiUrl = $this->appService . '/list';
            $rst = ClientRequest::post($apiUrl, $params);
            if (empty($rst['code'])) {
                return ErrorDef::retErr(ErrorDef::ERR_REMOTE);
            }
            return $rst;
        } catch (Exception $e) {
            Log::error('Exception Error: ' . $e->getFile() . '] [' . $e->getLine() . '] [' . $e->getMessage() . "]");
            return ErrorDef::retErr(ErrorDef::ERR_SERVER);
        }
    }
}
