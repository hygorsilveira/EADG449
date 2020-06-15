@extends('../layouts.app')

@push('scripts')
<!-- Scripts -->
<script src="{{ asset('js/processo/criar.js') }}"></script>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Processo</div>
                <div class="panel-body">
									<form class="form-horizontal">
                    <div class="form-group row">
											<label for="processo-id" class="col-sm-3 control-label">
												Nº do Processo:
											</label>
											<div class="col-sm-3">
												<input
                          type="text"
                          id="processo-id"
                          name="processo-id"
                          class="form-control"
                          disabled
												/>
											</div>
											<label for="data" class="control-label col-sm-3">
												Data do Processo:
											</label>
											<div class="col-sm-3">
												<input
                          type="text"
                          id="data"
                          name="data"
                          class="form-control"
                          disabled
												/>
											</div>
                    </div>
                    <div class="form-group">
											<label for="assunto" class="col-sm-3 control-label">
												Assunto:
											</label>
                      <div class="col-sm-9">
												<select
													type="text"
													id="assunto"
													name="assunto"
													class="form-control"
												>
													<option value="">Selecione um assunto</option>
													@foreach ($assuntos as $assunto)
														<option value="{{ $assunto->id }}">
															{{ $assunto->nome }}
														</option>
													@endforeach
												</select>
                      </div>
                    </div>
	                  <div class="form-group"> 								
											<label for="descricao" class="col-sm-3 control-label">
												Descrisão:
											</label>
                      <div class="col-sm-9">
												<input
													type="text"
													id="descricao"
													name="descricao"
													class="form-control"
												/>
											</div>
	                  </div>
                    <div class="form-group">
								      <label for="anexos" class="col-sm-3 control-label">Anexos:</label>
                      <div class="col-sm-9">
												<input
													type="file"
													id="anexos"
													name="anexos[]"
													class="form-control"
                          multiple
												/>
											</div>
				            </div>
										<table id="arquivos" class="table table-bordered">
											<tr class="active">
												<th>Item</th>
												<th>Nome do Arquivo</th>
												<th>Ação</th>
											</tr>
											@foreach ($arquivos as $arquivo)
												<tr>
													<td>{{ $arquivo->id }}</td>
													<td>{{ $arquivo->nome }}</td>
													<td>
														<a href="{{ url('arquivo' . $arquivo->id . '/remover') }}">
															Remover
														</a>
													</td>
												</tr>
											@endforeach
										</table>
										<div class="text-center">
											<button id="botao-salvar">Salvar</button>
											<button type="button">Desistir</button>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
