<div class="form-group row {{ $errors->has('descricao') ? 'has-error' : ''}}">
     <label for="descricao" class="col-form-label col-sm-2">{{ 'Descricao*' }}</label>
       <div class="col-sm-10">
       <input class="form-control" name="descricao" type="text" id="descricao" value="{{ isset($movimentosfinanceiro->descricao) ? $movimentosfinanceiro->descricao : ''}}" required>
       {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
     </div>
</div>
<div class="form-group row {{ $errors->has('valor') ? 'has-error' : ''}}">
     <label for="valor" class="col-form-label col-sm-2">{{ 'Valor*' }}</label>
       <div class="col-sm-10">
       <input class="form-control money" name="valor" type="texto" id="valor" value="{{ isset($movimentosfinanceiro->valor) ? $movimentosfinanceiro->valor : ''}}" >
       {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
     </div>
</div>
<div class="form-group row {{ $errors->has('data') ? 'has-error' : ''}}">
     <label for="data" class="col-form-label col-sm-2">{{ 'Data*' }}</label>
       <div class="col-sm-10">
       <input class="form-control date" name="data" type="text" id="data" value="{{ isset($movimentosfinanceiro->data) ? data_iso_para_br($movimentosfinanceiro->data) : ''}}" required>
       {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
     </div>
</div>
<div class="form-group row {{ $errors->has('tipo') ? 'has-error' : ''}}">
     <label for="tipo" class="col-form-label col-sm-2">{{ 'Tipo de Lançamento*' }}</label>
       <div class="col-sm-10">
       <select name="tipo" class="form-control" id="tipo" >
    @foreach (json_decode('{"entrada":"Entrada","Saida":"Saida"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($movimentosfinanceiro->tipo) && $movimentosfinanceiro->tipo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
       {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
     </div>
</div>
<div class="form-group row {{ $errors->has('empresa_id') ? 'has-error' : ''}}">
     <label for="empresa_id" class="col-form-label col-sm-2">{{ 'Empresa*' }}</label>
       <div class="col-sm-10">
           <select class="form-control" name="empresa_id" id="empresa-ajax" required>
               @if (isset($movimentosfinanceiro))
               <option value="{{$movimentosfinanceiro->empresa->id }}">
                   {{$movimentosfinanceiro->empresa->nome}} ({{$movimentosfinanceiro->empresa->razao_social}})
               </option>
                   @endif
           </select>
            {!! $errors->first('empresa_id', '<p class="help-block">:message</p>') !!}
     </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Criar' }}">
</div>
