<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class accountCreationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'company'=>'required',
            'city'=>'required',
            'country'=>'required',
            'accounttype'=>'required',
            'province'=>'required_if:country,Zimbabwe',
            'district'=>'required_if:country,Zimbabwe'
        ];
    }
}
