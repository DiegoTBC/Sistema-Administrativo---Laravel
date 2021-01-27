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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $movimentosfinanceiros = MovimentosFinanceiro::where('descricao', 'LIKE', "%$keyword%")
                ->orWhere('valor', 'LIKE', "%$keyword%")
                ->orWhere('data', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('empresa_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $movimentosfinanceiros = MovimentosFinanceiro::latest()->paginate($perPage);
        }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $movimentosfinanceiro = MovimentosFinanceiro::findOrFail($id);

        return view('movimentos-financeiros.edit', compact('movimentosfinanceiro'));
    }

    /**
     * @param MovimentoFinaneiroRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(MovimentoFinaneiroRequest $request, $id)
    {
        $requestData = $request->all();
        $movimentosfinanceiro = MovimentosFinanceiro::findOrFail($id);
        $movimentosfinanceiro->update($requestData);

        return redirect('movimentos-financeiros')->with('flash_message', 'Movimento Financeiro Atualizado!');
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
