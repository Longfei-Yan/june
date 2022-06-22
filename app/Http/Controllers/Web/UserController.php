<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('register');
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
        return redirect()->route('users.show', [$user]);
    }

    public function show(User $user, Request $request)
    {
        $moduleName = 'account';
        $addresses = $request->user()->addresses;

        return view('users', compact('moduleName', 'user','addresses'));
    }

    public function edit(User $user, Request $request)
    {
        $moduleName = 'account';
        $addresses = $request->user()->addresses;

        return view('users', compact('moduleName', 'user', 'addresses'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request , [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6',
            'birthdate' => 'nullable'
        ]);
        $data = [];
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['birthdate'] = $request->birthdate;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {

    }

    /**
     * 我的账户
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myAccount(User $user, Request $request)
    {
        $moduleName = 'account';
        $user = $request->user();
        $addresses = $request->user()->addresses;

        return view('my-account', compact('moduleName', 'user', 'addresses'));
    }
}
