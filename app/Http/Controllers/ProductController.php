<?php
namespace App\Http\Controllers;

use App\Services\Brand\BrandService;
use App\Services\Category\CategoryService;
use Illuminate\Support\Facades\View;

class ProductController extends BaseController
{
    public function lists()
    {
        return view('product.lists');
    }

    public function add()
    {
        $item = [];

        $brandService = new BrandService();

        $categoryService = new CategoryService();

        $item["attrs_template"] = $categoryService->getAttrsMaps(10003);

        if (empty($item["attrs_template"][0])) {
        }

        return view('product.add', ["item" => $item]);
    }

    public function create()
    {
        $item = [];

        $brandService = new BrandService();

        $categoryService = new CategoryService();

        $item["attrs_template"] = $categoryService->getAttrsMaps(10003);

        if (empty($item["attrs_template"][0])) {
        }

        return view('product.create', ["item" => $item]);
    }

    public function push() {
        return view('product.p');
    }
}
