<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
                    'email' => 'required|email|unique:users|max:255',
                    'password' => 'required|alpha_dash|min:6',
                ];
                break;
            case 'PATCH':
                return [
                    'first_name' => 'required|max:50',
                    'last_name' => 'required|max:50',
                    'password' => 'nullable|confirmed|min:6',
                    'birthdate' => 'nullable',
                    'gender' => 'nullable',
                ];
                break;
        }
    }
}
