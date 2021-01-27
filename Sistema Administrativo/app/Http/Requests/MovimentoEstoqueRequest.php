<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovimentoEstoqueRequest extends FormRequest
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
            'produto_id' => 'required',
            'quantidade' => 'required|numeric',
            'valor' => 'required|numeric'
        ];
    }

    /**
     * Os dados da requisição vao chegar aqui, e serão tratados antes de serem validados pelo laravel
     *
     * @return array
     */
    public function validationData()
    {
        $campos = $this->all();
        $campos['valor'] = numero_br_para_iso($campos['valor']);
        $campos['quantidade'] = numero_br_para_iso($campos['quantidade']);

        $this->replace($campos);
        return $campos;
    }

}
