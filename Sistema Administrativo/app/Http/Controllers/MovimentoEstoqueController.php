<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentoEstoqueRequest;
use App\MovimentosEstoque;

class MovimentoEstoqueController extends Controller
{

    public function store(MovimentoEstoqueRequest $request)
    {
        $dados = $request->all();
        MovimentosEstoque::create($dados);
        return redirect()->back();

    }

    public function destroy(int $id)
    {
        MovimentosEstoque::destroy($id);
        return redirect()->back();
    }
}
