<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingFormRequest extends FormRequest
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
        $rules = [
            'website_name'=>[
                'required',
            ],
            'website_logo'=>[
                'required',
            ],
            'website_favicon'=>[
                'required',
            ],
            'description'=>[
                'required'
            ],
            'meta_title'=>[
                'required',
                'string'
            ],
            'meta_description'=>[
                'nullable',
                'string'
            ],
            'meta_keyword'=>[
                'nullable',
                'string'
            ]

        ];

        return $rules;
    }
}
