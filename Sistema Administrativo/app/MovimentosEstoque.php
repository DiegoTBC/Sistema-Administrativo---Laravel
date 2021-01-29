<?php

namespace App;

use App\Observers\MovimentosEstoqueObserver;
use Illuminate\Database\Eloquent\Model;

class MovimentosEstoque extends Model
{
    /**
     * Define o nome da tabela
     */
    protected $table = 'movimentos_estoque';

    protected $fillable = ['produto_id', 'quantidade', 'valor', 'tipo', 'empresa_id'];

    protected $with = ['produto'];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto')->withTrashed();
    }

    /**
     * Configura a relação com o histórico do saldo
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function saldo()
    {
        return $this->morphOne('App\Saldo', 'movimento');
    }

}
