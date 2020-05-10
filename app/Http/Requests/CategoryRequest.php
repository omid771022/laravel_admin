<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [

            'name'=>'required',
            'slug'=>'required|unique:categories',


        ];
    }

    public function messages()
    {

return[
           'name.required'=>'   ,hvn ;kdnnفیلد را',
            'slug.required'=>'فیلد را  پر کنید',
            'slug.unique'=>' یک مقدار  خاص وارد کنید ',
];



    }
}
