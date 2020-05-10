<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required',
            'name' => 'required',
            'password' => 'min:8|confirmed',
            'password_confirmation' => 'min:8|required',
        ];
    }



    public function messages()
    {

        return [
            'name.required' => ' فیلد نام  خالی است ',
            'email.required' => 'فیلد عنوان را پر کنید',
            'password.confirmed' => 'رمز عبور یکسان نیست',
            'password.required' => ' رمز عبوذر خالی است ',
            'password.min'=>' پسورد باید ۸ کارکتر باشد',
            'password_confirmation.min'=>' پسورد باید ۸ کارکتر باشد',
            'password_confirmation.required'=>' خالی است ',
       
       
        ];
    }
}
