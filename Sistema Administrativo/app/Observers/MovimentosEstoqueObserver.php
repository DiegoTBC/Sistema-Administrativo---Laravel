<?php

namespace App\Observers;

use App\MovimentosEstoque;
use App\Saldo;

class MovimentosEstoqueObserver
{
    public function created(MovimentosEstoque $movimentosEstoque)
    {
        $saldo = Saldo::ultimoPorEmpresa($movimentosEstoque->empresa_id);

        $movimentosEstoque->saldo()->create([
            'valor' => $saldo->valor + ($movimentosEstoque->quantidade * $movimentosEstoque->valor),
            'empresa_id' => $movimentosEstoque->empresa_id
        ]);
    }
}
