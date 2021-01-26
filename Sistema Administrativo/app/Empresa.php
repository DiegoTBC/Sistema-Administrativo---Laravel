<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\AbstractPaginator;

class Empresa extends Model
{
    use SoftDeletes;

    protected $fillable = ['tipo', 'nome', 'razao_social', 'documento', 'ie_rg',
        'nome_contato', 'celular', 'email', 'telefone', 'cep', 'logradouro',
        'bairro', 'cidade', 'estado', 'observacao'];

    public static function todasPorTipo(string $tipo, int $quantidade=10): AbstractPaginator
    {

        return self::where('tipo', $tipo)->paginate($quantidade);
    }
}
