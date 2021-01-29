<?php

namespace App\Observers;

use App\MovimentosEstoque;

class MovimentosEstoqueObserver
{
    public function created(MovimentosEstoque $movimentosEstoque)
    {
        $movimentosEstoque->saldo()->create([
            'valor' => 100.99,
            'empresa_id' => $movimentosEstoque->empresa_id
        ]);
    }
}
