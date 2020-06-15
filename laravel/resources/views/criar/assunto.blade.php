@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Assunto</div>
                <div class="panel-body">
									<form
										class="form-horizontal"
										action="/api/assunto/salvar"
										method="POST"
									>
                    <div class="form-group">
											<label for="assunto-id" class="col-sm-3 control-label">
												ID:
											</label>
											<div class="col-sm-3">
												<input
                          type="text"
                          id="id"
                          class="form-control"
													@if ($id)
														name="id"
													@endif
													value="{{ $id }}"
                          readonly
												/>
											</div>
										</div>
                    <div class="form-group">
											<label for="assunto" class="control-label col-sm-3">
												Assunto:
											</label>
											<div class="col-sm-6">
												<input
                          type="text"
                          id="nome"
                          name="nome"
													value="{{ $nome }}"
                          class="form-control"
												/>
											</div>
                    </div>
                    <div class="form-group">
											<label class="col-sm-3 control-label">
												Situação:
											</label>
											<div class="btn-group col-sm-6" data-toggle="buttons">
												<label class="active">
													<input
														type="radio"
														name="situacao"
														id="situacao1"
                            value="1"
														@if ($situacao)
															checked
														@endif
													/>
													Ativo
												</label>
												<label>
													<input
														type="radio"
														name="situacao"
														id="situacao2"
                            value=""
														@if (!$situacao)
															checked
														@endif
													/>
													Inativo
												</label>
											</div>
                    </div>
										<div class="text-center">
											<button id="botao-salvar">Salvar</button>
											<button
												type="button"
												onclick="window.location.href='/api/assunto/listar'"
											>
												Desistir
											</button>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
