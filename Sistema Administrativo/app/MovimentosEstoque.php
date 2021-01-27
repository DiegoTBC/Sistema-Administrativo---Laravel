<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimentosEstoque extends Model
{
    /**
     * Define o nome da tabela
     */
    protected $table = 'movimentos_estoque';

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }

}
