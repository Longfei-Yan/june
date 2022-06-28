<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $moduleName = 'checkout';
        $cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();
        $amount = 0;
        foreach ($cartItems as $item){
            $amount += $item->productSku->product->price;
        }
        $addresses = $request->user()->addresses()->orderBy('last_used_at', 'desc')->first();

        return view('checkout', compact('moduleName', 'cartItems', 'amount', 'addresses'));
    }

    public function store()
    {
        redirect('success');
    }
}
