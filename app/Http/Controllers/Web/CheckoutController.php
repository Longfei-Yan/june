<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $moduleName = ['moduleName'=>'checkout'];
        return view('checkout', $moduleName);
    }

    public function store()
    {
        redirect('success');
    }
}
