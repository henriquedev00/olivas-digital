<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
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
            'nome' => 'required|min:3|max:255',
            'email' => [
                'required',
                'min:5',
                Rule::unique('clientes')->ignore($this->segment(3)),
                'max:255',
                'email:rfc,dns',
            ],
            'imagem' => 'file|mimes:jpg,jpeg,png|max:6000',
            'telefone' => 'required',
            'tipoCliente' => 'required',
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
            'nome.required' => 'Um nome é obrigatório',
            'email.required' => 'Um e-mail é obrigatório',
            'telefone.required' => 'Pelo menos um telefone é obrigatório',
            'tipoCliente.required' => 'Tipo do cliente é obrigatório',

            'nome.min' => 'Mínimo de :min caracteres',
            'email.min' => 'Mínimo de :min caracteres',

            'nome.max' => 'Máximo de :max caracteres',
            'email.max' => 'Máximo de :max caracteres',
            'imagem.max' => 'Máximo de 6MB',

            'email.unique' => 'E-mail já cadastrado',
            'email.email' => 'E-mail inválido',

            'imagem.file' => 'Formato de arquivo inválido',
            'imagem.mimes' => 'O arquivo precisa ser do tipo jpg, jpeg, png',
        ];
    }
}
