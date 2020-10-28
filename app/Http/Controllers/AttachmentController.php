<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Exception;

use App\Common\ErrorDef;

class AttachmentController extends Controller
{
    public function upload(Request $request)
    {
        return view('brand.upload', [
            'data' => []
        ]);
    }
    /**
     * 附件上传
     * 
     * @author Alex Pan <psj474@163.com>
     * 
     * @access public
     * 
     * @param string $name   店铺名称
     * 
     * @return array 
     * 
     */
    public function uploadImage(Request $request)
    {
        // dd($request->input('image'));
        $file = $request->hasFile('image');
        dd($file);
        // 1.是否上传成功
        if (!$file->isValid()) {
            return false;
        }

        // 2.是否符合文件类型 getClientOriginalExtension 获得文件后缀名
        $fileExtension = $file->getClientOriginalExtension();
        if (!in_array($fileExtension, ['png', 'jpg', 'gif'])) {
            return false;
        }

        // 3.判断大小是否符合 2M
        $tmpFile = $file->getRealPath();
        if (filesize($tmpFile) >= 2048000) {
            return false;
        }

        // 4.是否是通过http请求表单提交的文件
        if (!is_uploaded_file($tmpFile)) {
            return false;
        }

        $disk = 'public';
        // 5.每天一个文件夹,分开存储, 生成一个随机文件名
        $fileName = date('Y_m_d') . '/' . md5(time()) . mt_rand(0, 9999) . '.' . $fileExtension;
        if (Storage::disk($disk)->put($fileName, file_get_contents($tmpFile))) {
            return Storage::url($fileName);
        }
    }
    public function uploadeImageBase64(Request $request)
    {
        $base64Image = urldecode($request->input('image'));
        preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64Image, $res);

        if (isset($res[2])) {
            //获取图片类型
            $imageType = $res[2];

            //图片新的名字
            $newFileName =  md5(date('Y-m-d H:i:s', time()) . mt_rand(10000, 99999)) . '.' . $imageType;
            $imageFile = base64_decode(str_replace($res[1], '', $base64Image));
            if (Storage::disk('public')->put($newFileName, $imageFile)) {
                return 'http://backend.shopbee.xinfos.com' . Storage::url($newFileName);
            }
        }
    }

    /**
     * 获取附件列表
     *
     * @access public
     * 
     * @param string $shop_id 店铺ID
     * 
     * @return array 
     */
    public function lists(Request $request)
    {
        try {
        } catch (Exception $e) {
        }
    }
}
