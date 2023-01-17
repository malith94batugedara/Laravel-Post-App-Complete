<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
           'name' =>[
              'required',
              'string',
              'max:200'
           ],
           'slug' =>[
            'required',
            'string',
            'max:200'
         ],
         'description' =>[
            'required'
         ],
         'image' =>[
            'nullable',
            'mimes:jpeg,jpg,png'
         ],
         'meta_title' =>[
            'required',
            'string',
            'max:200'
         ],
         'meta_description' =>[
            'required',
            'string'
         ],
         'meta_keyword' =>[
            'required',
            'string'
         ],
         'navbar_status' =>[
            'nullable'
         ],
         'status' =>[
            'nullable'
         ]
        ];
        return $rules;
    }
}
