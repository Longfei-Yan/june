<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $moduleName = ['moduleName'=>'cart'];
        return view('cart', $moduleName);
    }
}
