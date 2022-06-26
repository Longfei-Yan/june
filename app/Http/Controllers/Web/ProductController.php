<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $moduleName = 'products';
        $products = Product::query()->where('on_sale', true)->paginate();
        return view('products', compact('moduleName', 'products'));
    }

    public function show()
    {
        $moduleName = ['moduleName'=>'product'];
        return view('product', $moduleName);
    }
}
