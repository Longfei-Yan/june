<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function myAccount()
    {
        $moduleName = ['moduleName'=>'account'];
        return view('my-account', $moduleName);
    }

    public function store()
    {
        return redirect('/');
    }
}
