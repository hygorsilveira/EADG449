<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;

class UnidadeController extends Controller
{
	public function listar () {
		return view('listar', [
			'nome'      => 'Unidades',
			'cabecalho' => ['ID', 'Nome da Unidade', 'Sigla', 'Situação'],
			'lista'     => array_map(
				function($row) {
					return array_merge($row, [
						'situacao' => $row['situacao'] ? 'Ativo' : 'Inativo'
					]);
				},
				Unidade::all(['id', 'nome', 'sigla', 'situacao'])->toArray(),
			),
		]);
	}

	public function criar (Request $request) {
		return view('criar.unidade', [
			'id'       => '',
			'nome'     => '',
			'sigla'    => '',
			'situacao' => true,
		]);
	}

	public function editar ($id, Request $request) {
		$unidade = Unidade::find($id);
		return view('criar.unidade', [
			'id'       => $unidade->id,
			'nome'     => $unidade->nome,
			'sigla'    => $unidade->sigla,
			'situacao' => $unidade->situacao,
		]);
	}

	public function remover ($id) {
		$unidade = Unidade::find($id);
		$unidade->delete();
		return redirect('api/unidade/listar');
	}

	public function salvar (Request $request) {
		$unidade = isset($request->id) ? Unidade::find($request->id) : new Unidade();

		$unidade->nome     = $request->nome;
		$unidade->sigla    = $request->sigla;
		$unidade->situacao = isset($request->situacao) && strlen($request->situacao);
		$unidade->save();

		return redirect('api/unidade/listar');
	}
}
