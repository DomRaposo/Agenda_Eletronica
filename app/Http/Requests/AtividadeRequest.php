<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtividadeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permitir a requisição (ou personalizar regras de autorização)
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date|after:data_inicio',
            'status' => 'required|in:pendente,concluída,cancelada',
        ];
    }
}
