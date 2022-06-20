<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function myAccount(User $user)
    {
        $moduleName = ['moduleName'=>'account'];
        return view('my-account', $moduleName);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('my-account', [$user]);
    }
}
