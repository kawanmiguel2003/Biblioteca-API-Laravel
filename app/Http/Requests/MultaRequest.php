<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'usuario_id' => 'required|exists:usuarios,id',
            'emprestimo_id' => 'required|exists:emprestimos,id',
            'valor' => 'required|numeric|min:0',
        ];
    }
}
