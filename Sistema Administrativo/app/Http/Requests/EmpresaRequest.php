<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaRequest extends FormRequest
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
            'tipo' => ['required', Rule::in(['cliente', 'fornecedor'])],
            'nome' => ['required', 'max:255'],
            'razao_social' => ['max:255'],
            'documento' => $this->tipoValidacaoDocumento(),
            'nome_contato' => ['required', 'max:255'],
            'celular' => ['required', 'size:11'],
            'email' => ['required', 'email'],
            'telefone' => ['size:10'],
            'cep' => ['required', 'size:8'],
            'logradouro' => ['required', 'max:255'],
            'bairro' => ['required', 'max:50'],
            'cidade' => ['required', 'max:50'],
            'estado' => ['required', 'size:2']
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
        $campos['documento'] = str_replace(['.', '-','/'], '', $campos['documento']);
        $campos['celular'] = str_replace([' ', '(', ')', '-'], '', $campos['celular']);
        $campos['telefone'] = str_replace(['(', ')', '-', ' '], '', $campos['telefone']);
        $campos['cep'] = str_replace('-', '', $campos['cep']);
        $this->replace($campos);
        return $campos;
    }

    /**
     *  Retorna o tipo de validação baseado no tamanho do campo de doc
     *
     * @return string[]
     */
    public function tipoValidacaoDocumento()
    {
        if (strlen($this->documento) === 11) {
            return ['required','cpf'];
        }
        return ['required','cnpj'];
    }
}
