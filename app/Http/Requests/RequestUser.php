<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            'email'=>'required|email',
            'password'=> 'required|min:5',
        ];

    }
    public function messages()
    {
        return [
            'email.required'=> 'Veuiller saisir votre email ! ',
            'email.email'=> 'Cet Email n\'est reconnu',
            'password.required'=>'Entrer password',
            'password.min'=>'Votre password doit être au moins de 5 caractère'
        ];

    }
}
