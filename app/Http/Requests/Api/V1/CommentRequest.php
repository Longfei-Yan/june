<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  =>  'required',
            'email'  =>  'required|email|max:255',
            'subject'  =>  'required|max:255',
            'message'  =>  'required|max:255',
        ];
    }
}
