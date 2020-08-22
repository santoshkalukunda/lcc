<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companyrequest extends FormRequest
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
            'name'=>'required',
            'reg_no'=>'required',
            'reg_date'=>'required',
            'fiscal_year'=>'required',
            'category'=>'required|in:private,public,non-profitable',
            'address'=>'required',
            'contact_no'=>'required',
            'share'=> 'required|numeric'
        ];

    }
}
