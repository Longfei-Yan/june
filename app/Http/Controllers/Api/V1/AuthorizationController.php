<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\AuthorizationRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function store(AuthorizationRequest $request)
    {
        $credentials['email'] = $request->email;
        $credentials['password'] = $request->password;

        if (!$token = auth('api')->attempt($credentials)) {
            throw new AuthenticationException('Email or password is wrong');
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function update()
    {
        $token = auth('api')->refresh();
        return $this->respondWithToken($token);
    }

    public function destroy()
    {
        auth('api')->logout();
        return response(null, 204);
    }
}
