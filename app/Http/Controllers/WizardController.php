<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Services\Shop\ShopService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Exception;

class WizardController extends BaseController {
    
    public function choose(Request $request) {
        return view('wizard.choose');
    }

    public function version(Request $request) {
        //店铺类型
        $shopType = (int) $request->input('t');
        if ($shopType <= 0) {
            $shopType = 1;
        }
        return view('wizard.version', [
            'shopType' => $shopType,
        ]);
    }

    public function category(Request $request) {
        $shopType = (int) $request->input('t');
        $shopVersion = (int) $request->input('v');
        
        if ($shopType <= 0) {
            $shopType = 1;
        }

        if ($shopVersion <= 0) {
            $shopVersion = 1;
        }

        return view('wizard.category', [
            'shopType' => $shopType,
            'shopVersion' => $shopVersion,
        ]);
    }

    public function create(Request $request) {
        $input = [
            "type"    => (int) $request->input('type'),
            "version" => (int) $request->input('version'),
            "cat_id"  => (int) $request->input('cat'),
        ];

        return view('wizard.create', $input); 
    }

    public function success(Request $request) {
        $input = [
            "type"    => (int) $request->input('type'),
            "version" => (int) $request->input('version'),
            "cat_id"  => (int) $request->input('cat'),
            "address" => $request->input('address'),
        ];

        return view('wizard.success'); 
    }
}