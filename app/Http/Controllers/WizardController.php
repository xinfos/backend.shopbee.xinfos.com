<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Services\Shop\ShopService;
use Illuminate\Support\Facades\Auth;

use Exception;

class WizardController extends Controller {
    
    public function choose() {
        return view('wizard.choose');
    }

    public function edition() {
        return view('wizard.edition');
    }

    public function category() {
        return view('wizard.category');
    }

    public function create() {
        return view('wizard.create'); 
    }
}