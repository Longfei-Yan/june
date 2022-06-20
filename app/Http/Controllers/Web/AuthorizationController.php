<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function create()
    {
        $moduleName = ['moduleName'=>'login'];
        return view('login', $moduleName);
    }

    public function store()
    {
        return redirect('/');
    }
}
