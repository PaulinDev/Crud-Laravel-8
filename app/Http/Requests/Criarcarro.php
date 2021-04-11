<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Criarcarro extends FormRequest
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
            'user' => 'required|gt:0',
            'modelo' => 'required',
            'marca' => 'required',
            'ano' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'Por favor, selecione um usuário',
            'user.gt' => 'Você não selecionou o usuário',
            'modelo.required' => 'Digite o modelo do carro',
            'marca.required' => 'Digite a marca do carro',
            'ano.required' => 'Digite o ano do carro',
            'ano.min' => 'Digite o ano no formato XXXX'
        ];
    }
}
