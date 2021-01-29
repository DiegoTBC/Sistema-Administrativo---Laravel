@extends('layouts.app')

@section('title')
    <h1>Relatório de Saldo - {{$empresa->nome}}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Listagem de Movimentos Financeiros</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Movimentações</div>
                    <div class="card-body">

                        <form method="GET">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="data_inicial">Data Inicial</label>
                                        <div class="input-group">
                                            <input id="data_inicial" name="data_inicial" type="text" class="form-control date" value="{{ request('data_inicial') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="data_final">Data Final</label>
                                        <div class="input-group">
                                            <input id="data_final" name="data_final" type="text" class="form-control date" value="{{ request('data_final') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group pt-2">
                                        <label class="control-label" for=""></label>
                                        <div class="input-group">
                                            <button class="btn btn-info m-t-xs" title="Buscar Conta"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th>Empresa</th>
                                    <th>Descricao</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($saldo as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="badge badge-{{$item->tipo === 'entrada' ? 'success' : 'danger'}}">{{ ucfirst($item->tipo)}}</span></td>
                                        <td>{{ ucfirst($item->empresa->nome)}} ({{ $item->empresa->razao_social}})</td>
                                        <td>{{ $item->descricao }}</td>
                                        <td>R$ {{ numero_iso_para_br($item->valor) }}</td>
                                        <td>{{ data_iso_para_br($item->created_at) }}</td>
                                        <td>
                                            <a href="{{ url('/movimentos-financeiros/' . $item->id) }}" title="Detalhes MovimentosFinanceiro"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</button></a>
                                            <form method="POST" action="{{ url('/movimentos-financeiros' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete MovimentosFinanceiro" onclick="return confirm(&quot;Tem certeza que deseja excluir?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
