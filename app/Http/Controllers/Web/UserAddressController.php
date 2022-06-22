<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $addresses = $request->user()->addresses;
        return view('user-address', compact('user', 'addresses'));
    }
}
