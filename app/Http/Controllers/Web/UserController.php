<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {

    }

    public function myAccount()
    {
        return view('my-account');
    }

    public function store()
    {
        return redirect('/');
    }
}
