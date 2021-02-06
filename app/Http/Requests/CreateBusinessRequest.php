<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessRequest extends FormRequest
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
                   'username'=>'required|min:4|unique:user_businesses,username',
                   'company_name'=>'required',
                   'location'=>'required|string',
                   'email'=>'required|unique:Users,email|email',
                   'telephone'=>'required|numeric|digits:10',
                   'password'=>'required|min:6|confirmed',
                   'term2'=>'required'
        ];

    
    }
      

       public function messages()
        {
          return [
                  'term2.required'=>'you must agree term and condition'
          ];
        }
}
