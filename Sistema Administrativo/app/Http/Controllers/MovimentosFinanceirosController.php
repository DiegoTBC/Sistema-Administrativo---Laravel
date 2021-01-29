<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Http\Requests\MovimentoFinaneiroRequest;
use App\Models\MovimentosFinanceiro;
use Illuminate\Http\Request;

class MovimentosFinanceirosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (!$request->filled('data_inicial') || !$request->filled('data_final')) {
            return redirect()->route('movimentos-financeiros.index', [
                'data_inicial' => (new \DateTime('first day of this month'))->format('d/m/Y'),
                'data_final' => (new \DateTime('last day of this month'))->format('d/m/Y')
            ]);
        }

        $movimentosfinanceiros = MovimentosFinanceiro::buscaPorIntervalo(
            data_br_para_iso($request->data_inicial),
            data_br_para_iso($request->data_final)
        );


        return view('movimentos-financeiros.index', compact('movimentosfinanceiros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('movimentos-financeiros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MovimentoFinaneiroRequest $request)
    {
        $requestData = $request->all();
        MovimentosFinanceiro::create($requestData);

        return redirect('movimentos-financeiros')->with('flash_message', 'Movimento Financeiros adicionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $movimentosfinanceiro = MovimentosFinanceiro::findOrFail($id);

        return view('movimentos-financeiros.show', compact('movimentosfinanceiro'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MovimentosFinanceiro::destroy($id);

        return redirect('movimentos-financeiros')->with('flash_message', 'MovimentosFinanceiro deleted!');
    }
}
