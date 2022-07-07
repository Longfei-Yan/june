<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserAddressRequest;
use App\Http\Resources\UserAddressesResource;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function index(Request $request)
    {
        return new UserAddressesResource($request->user()->addresses);
    }

    public function store(UserAddress $userAddress, UserAddressRequest $request)
    {
        $this->authorize('own', $userAddress);
        $request->user()->addresses()->create($request->only([
            'country',
            'province',
            'city',
            'district',
            'address',
            'zip',
            'first_name',
            'last_name',
            'phone',
        ]));

    }

    public function update(UserAddress $userAddress, UserAddressRequest $request)
    {
        $this->authorize('own', $userAddress);
        $userAddress->update($request->only([
            'country',
            'province',
            'city',
            'district',
            'address',
            'zip',
            'first_name',
            'last_name',
            'phone',
        ]));
    }

    public function destory(UserAddress $userAddress)
    {
        $this->authorize('own', $userAddress);
        $userAddress->delete();
    }
}
