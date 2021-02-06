<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHackerRequest extends FormRequest
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
        return [  'Hname'=>'required',
                  'HUsername'=>'required|string|unique:user_hackers,username',
                  'Hemail'=>'required|unique:users,email',
                  
                  'Hpassword' => 'required|confirmed|min:6',
                  'Haddress'=>'required',
                  'term'=>'required'
             
        ];

    }

    public function messages()
        {
          return [
                  'Hname.required'=>'Name is required',
                   'HUsername.required'=>'username is required',
                   'Hemail.required'=>'email is required',
                   'Hpassword.required'=>'password is required',
                   'Hpassword.confirmed'=>'confirm password didnot match',
                    'Haddress.required'=>'Address field is required',
                    'Hname.alpha'=>'The name fied must be letter',
                      'Hemail.unique'=>'The email has been taken already',
                      'term.required'=>'you must agree term and condition',
                      'Husername.unique'=>'username has already taken'
          ];
        }
}
