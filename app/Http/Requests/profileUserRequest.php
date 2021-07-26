<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'surname'=>'required',
            'email' => 'required|string|email|max:255|unique:users,id',
            'password' => 'required|string|confirmed|min:8',
        ];
    }
}
