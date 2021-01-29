<?php

namespace App\Observers;

use App\MovimentosEstoque;
use App\Saldo;
use Illuminate\Support\Facades\DB;

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

    public function deleted(MovimentosEstoque $movimentosEstoque)
    {
        $saldo = $movimentosEstoque->saldo;
        $valorMovimento = $movimentosEstoque->quantidade * $movimentosEstoque->valor;
        Saldo::where('created_at', '>', $saldo->created_at)
            ->update([
                'valor' => DB::raw("valor - $valorMovimento")
            ]);

        $saldo->delete();
    }
}
