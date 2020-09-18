<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShareholderRequest extends FormRequest
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
            'shareholder_name'=>'required',
            'shareholder_address'=>'required',
            'shareholder_contact'=>'required',
            'email'=>'required|email',
        ];
    }
}
