<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $moduleName = ['moduleName'=>'products'];
        return view('products', $moduleName);
    }

    public function show()
    {
        $moduleName = ['moduleName'=>'product'];
        return view('product', $moduleName);
    }
}
