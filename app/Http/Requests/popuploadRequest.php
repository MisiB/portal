<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class popuploadRequest extends FormRequest
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
            'proof'=>'required|file|mimes:pdf|max:5000000',
            'referencenumber'=>'required',
            'bank'=>'required',
            'date'=>'required'

        ];
    }
}
