<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store()
    {
        return redirect('/');
    }
}
