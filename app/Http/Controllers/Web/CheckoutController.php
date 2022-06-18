<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function store()
    {
        redirect('success');
    }
}
