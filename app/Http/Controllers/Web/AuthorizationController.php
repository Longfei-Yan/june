<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthorizationController extends Controller
{
    public function create()
    {
        $moduleName = ['moduleName'=>'login'];
        return view('login', $moduleName);
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('my-account', [Auth::user()]);
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('login');
    }
}
