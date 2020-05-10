<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:articles',
            'img' => 'required|mimes:jpg,jpeg,png',

        ];
    }
    public function messages()
    {
        return[
            'img.required' => 'فیلد عکس ها خالیست ',
            'name.required' => 'فیلد را  پر کنید',
            'slug.required' => 'فیلد را  پر کنید',
            'slug.unique' => ' یک مقدار  خاص وارد کنید ',
            'img.mimes' => 'نوع  عکس غلط است ',
    ];
    }
}
