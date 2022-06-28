<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        return view('thinkyou');
    }
}
