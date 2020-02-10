<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
    public function lists() {
        return view('product.lists');
    }
}