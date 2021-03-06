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

    /**
     * Define dados para serialização
     * @var string[]
     */
    protected $visible = ['id', 'text'];
    /**
     * Anexa acessor para serialização
     * @var string[]
     */
    protected $appends = ['text'];

    public static function buscaPorId(int $id)
    {
        return self::with(['movimentosEstoque' => function($query) {
            $query->latest()->take(3);
        },
            'movimentosEstoque.produto' => function($query) {
            $query->withTrashed();
            }])
            ->findOrFail($id);
    }

    public function movimentosEstoque()
    {
        return $this->hasMany('App\MovimentosEstoque');
    }

    public static function todasPorTipo(string $tipo, string $busca, int $quantidade=10): AbstractPaginator
    {
        return self::where('tipo', $tipo)
            ->where(function($q) use ($busca){
                $q->orWhere('nome', 'LIKE', "%$busca%")
                    ->orWhere('razao_social', 'LIKE', "%$busca%")
                    ->orWhere('nome_contato', 'LIKE', "%$busca%");
            })
            ->paginate($quantidade);
    }

    public static function buscarPorNomeTipo(string $nome, string $tipo)
    {
        $nome = '%' . $nome . '%';

        return self::where('nome', 'LIKE', $nome)
            ->where('tipo', $tipo)
            ->get();
    }

    /**
     * Cria acessor chamado text para serialização
     * @return string
     */
    public function getTextAttribute()
    {
        return sprintf(
          '%s (%s)',
          $this->attributes['nome'], $this->attributes['tipo']
        );
    }
}
