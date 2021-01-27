<?php

namespace App\Http\Controllers;

use App\MovimentosEstoque;
use Illuminate\Http\Request;

class MovimentoEstoqueController extends Controller
{
    public function destroy(int $id)
    {
        MovimentosEstoque::destroy($id);
        return redirect()->back();
    }
}
