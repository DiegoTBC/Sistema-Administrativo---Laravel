@extends('layouts.app')

@section('title')
    <h1>Novo Movimento Financeiro</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/movimentos-financeiros') }}">Listagem de Movimentos Financeiro</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{ url('/movimentos-financeiros/create') }}">Novo Movimento Financeiro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Movimentos Financeiros {{ $movimentosfinanceiro->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/movimentos-financeiros') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/movimentos-financeiros/' . $movimentosfinanceiro->id . '/edit') }}" title="Edit MovimentosFinanceiro"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('movimentosfinanceiros' . '/' . $movimentosfinanceiro->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete MovimentosFinanceiro" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $movimentosfinanceiro->id }}</td>
                                    </tr>
                                    <tr><th> Tipo </th> <td><span class="badge badge-{{$movimentosfinanceiro->tipo === 'entrada' ? 'success' : 'danger'}}">{{ ucfirst($movimentosfinanceiro->tipo)}}</span></td></tr>
                                    <tr><th> Empresa </th><td>{{ ucfirst($movimentosfinanceiro->empresa->nome)}} ({{ $movimentosfinanceiro->empresa->razao_social}})</td>></tr>
                                    <tr><th> Descricao </th><td> {{ $movimentosfinanceiro->descricao }} </td></tr>
                                    <tr><th> Data </th><td> {{ data_iso_para_br($movimentosfinanceiro->data) }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
