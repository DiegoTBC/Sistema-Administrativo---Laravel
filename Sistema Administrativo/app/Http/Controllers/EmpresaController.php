<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class EmpresaController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $tipo = $request->tipo;
        $this->validaTipo($tipo);

        $empresas = Empresa::todasPorTipo($tipo);

        return view('empresa.index', compact('empresas', 'tipo'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
        $tipo = $request->tipo;
        $this->validaTipo($tipo);

        return view('empresa.create', compact('tipo'));

    }

    /**
     * @param EmpresaRequest $request
     * @return Response
     */
    public function store(EmpresaRequest $request): Response
    {
        $empresa = Empresa::create($request->except('_token'));
        return redirect()->route('empresas.show', $empresa->id);
    }

    /**
     * @param Empresa $empresa
     * @return View
     */
    public function show(int $id): View
    {
        $empresa = Empresa::buscaPorId($id);

        return view('empresa.show', compact('empresa'));
    }

    /**
     * @param Empresa $empresa
     * @return View
     */
    public function edit(Empresa $empresa): View
    {
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * @param EmpresaRequest $request
     * @param Empresa $empresa
     * @return Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa): Response
    {
        $empresa->update($request->all());
        return redirect()->route('empresas.show', $empresa);
    }

    /**
     * @param Empresa $empresa
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function destroy(Empresa $empresa, Request $request): Response
    {
        $tipo = $request->tipo;
        $this->validaTipo($tipo);

        $empresa->delete();
        return redirect()->route('empresas.index', ['tipo' => $tipo]);
    }

    /**
     * Verifica se é cliente ou fornecedor
     *
     * @param string $tipo
     */
    private function validaTipo(string $tipo): void
    {
        if ($tipo !== 'cliente' && $tipo !== 'fornecedor') {
            abort(404);
        }
    }
}
