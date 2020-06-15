@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
								<div class="panel-heading">
									Listar {{ strtoupper($nome[0]) . substr($nome, 1) }}
								</div>
                <div class="panel-body">
										<table class="table table-bordered">
											<tr class="active">
												@foreach ($cabecalho as $key)
													<th>{{ $key }}</th>
												@endforeach
												<th>Ações</th>
											</tr>
											@foreach ($lista as $elemento)
												<tr>
													@foreach ($elemento as $atributo)
														<td>{{ $atributo }}</td>
													@endforeach
													<td>
														<a href="{{ $elemento['id'] . '/editar' }}">
															Editar
														</a>
														<a href="{{ $elemento['id'] . '/remover' }}">
															Remover
														</a>
													</td>
												</tr>
											@endforeach
										</table>
										<div class="text-right">
											<a href="criar">
												<button type="button">Adicionar</button>
											</a>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
