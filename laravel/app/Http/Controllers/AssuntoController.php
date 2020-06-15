<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assunto;

class AssuntoController extends Controller
{
	public function listar () {
		return view('listar', [
			'nome' => 'assunto',
			'cabecalho' => ['ID', 'Assunto', 'Situação'],
			'lista' => array_map(
				function($row) {
					return array_merge($row, [
						'situacao' => $row['situacao'] ? 'Ativo' : 'Inativo'
					]);
				},
				Assunto::all(['id', 'nome', 'situacao'])->toArray(),
			),
		]);
	}

	public function criar (Request $request) {
		return view('criar.assunto', [
			'id'       => '',
			'nome'     => '',
			'situacao' => true,
		]);
	}

	public function editar ($id) {
		$assunto = Assunto::find($id);
		return view('criar.assunto', [
			'id'       => $assunto->id,
			'nome'     => $assunto->nome,
			'situacao' => $assunto->situacao,
		]);
	}

	public function remover ($id) {
		$assunto = Assunto::find($id);
		$assunto->delete();
		return redirect('api/assunto/listar');
	}

	public function salvar (Request $request) {
		$assunto = isset($request->id) ? Assunto::find($request->id) : new Assunto();

		$assunto->nome     = $request->nome;
		$assunto->situacao = isset($request->situacao) && strlen($request->situacao);
		$assunto->save();

		return redirect('api/assunto/listar');
	}
}
