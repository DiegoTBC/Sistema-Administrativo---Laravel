@extends('layouts.app')

@section('title')
    <h1>Listagem MovimentosFinanceiro</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/movimentos-financeiros') }}">Listagem MovimentosFinanceiro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Movimentosfinanceiros</div>
                    <div class="card-body">
                        <a href="{{ url('/movimentos-financeiros/create') }}" class="btn btn-success btn-sm" title="Novo MovimentosFinanceiro">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>

                        <form method="GET" action="{{ url('/movimentos-financeiros') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Pesquisar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Descricao</th><th>Valor</th><th>Data</th><th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($movimentosfinanceiros as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->descricao }}</td><td>{{ $item->valor }}</td><td>{{ $item->data }}</td>
                                        <td>
                                            <a href="{{ url('/movimentos-financeiros/' . $item->id) }}" title="Detalhes MovimentosFinanceiro"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</button></a>
                                            <a href="{{ url('/movimentos-financeiros/' . $item->id . '/edit') }}" title="Atualizar MovimentosFinanceiro"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Atualizar</button></a>

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
                            <div class="pagination-wrapper"> {!! $movimentosfinanceiros->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
