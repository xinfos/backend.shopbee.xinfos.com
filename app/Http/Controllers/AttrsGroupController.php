<?php
namespace App\Http\Controllers;

use App\Services\Category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AttrsGroupController extends BaseController
{
    public function lists(Request $request) {
        
        return view('attrs.group');
    }

    public function Add(Request $request) {
        
        return view('attrs.groupadd');
    }
}