<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAuthRequest extends FormRequest
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
            'email' => 'required|min:5|max:255|email:rfc,dns|exists:users',
            'password' => 'required|min:5|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Um e-mail é obrigatório',
            'password.required' => 'Uma senha é obrigatório',

            'email.min' => 'Mínimo de :min caracteres',
            'password.min' => 'Mínimo de :min caracteres',

            'email.max' => 'Mínimo de :max caracteres',
            'password.max' => 'Mínimo de :max caracteres',

            'email.email' => 'E-mail inválido',

            'email.exists' => 'Nenhuma conta cadastrada no e-mail informado',
        ];
    }
}
