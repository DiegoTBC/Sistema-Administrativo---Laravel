<?php

namespace App\Http\Controllers\Selects;

use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresaNomeTipo extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Empresa::get();
    }
}
