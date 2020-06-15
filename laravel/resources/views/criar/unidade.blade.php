@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Unidade</div>
                <div class="panel-body">
									<form class="form-horizontal"
										action="/api/unidade/salvar"
										method="POST"
									>
                    <div class="form-group">
											<label for="unidade-id" class="col-sm-3 control-label">
												ID:
											</label>
											<div class="col-sm-3">
												<input
                          type="text"
                          id="id"
                          class="form-control"
                          @if($id)
														name="id"
                          @endif
                          value="{{ $id }}"
                          readonly
												/>
											</div>
										</div>
                    <div class="form-group">
											<label for="nome" class="control-label col-sm-3">
												Nome da Unidade:
											</label>
											<div class="col-sm-9">
												<input
                          type="text"
                          id="nome"
                          name="nome"
                          class="form-control"
                          value="{{ $nome }}"
												/>
											</div>
                    </div>
                    <div class="form-group row">
											<label for="sigla" class="control-label col-sm-3">
												Sigla da Unidade:
											</label>
											<div class="col-sm-3">
												<input
                          type="text"
                          id="sigla"
                          name="sigla"
                          class="form-control"
                          value="{{ $sigla }}"
												/>
											</div>
											<label for="situacao" class="col-sm-2 control-label">
												Situação:
											</label>
											<div class="btn-group" data-toggle="buttons">
												<label class="active">
													<input
														type="radio"
														name="situacao"
														id="situacao1"
														value="1"
														@if($situacao)
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
														@if(!$situacao)
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
												onclick="window.location.href='/api/unidade/listar'"
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
