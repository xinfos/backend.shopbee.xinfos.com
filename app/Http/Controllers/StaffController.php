<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Services\Staff\StaffService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class StaffController extends Controller {
    
    /**
     * @name 员工列表
    */
    public function lists(Request $request) {
         $input = [
            'shop_id'  => (int) $request->input('sid', 1),
            'name'  => (string) $request->input('name', ''),
            'mobile'  => (string) $request->input('mobile', ''),
            'state' => (int) $request->input('state', 0),
            'page'  => (int) $request->input('page', 1),
        ];
        
        $staffService = new StaffService();
        $data = $staffService->lists($input);

        return view('staff.lists', [
            'data' => $data
        ]);
    }
}