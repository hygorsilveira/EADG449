<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Processo;
use App\Assunto;
use App\Arquivo;

class ProcessoController extends Controller
{
	public function listar () {
		return view('listar', [
			'nome' => 'assunto',
			'cabecalho' => ['Nº do Processo', 'Descrição', 'Data do Processo', 'Situação'],
			'lista' => array_map(
				function($row) {
					return array_merge($row, ['situacao' => 'Iniciado']);
				},
				Processo::all(['id', 'descricao', 'created_at'])->toArray(),
			),
		]);
	}

	public function criar () {
		return view('processo.criar', [
			'assuntos' => Assunto::all(),
			'arquivos' => [],
		]);
	}

	public function editar ($id, Request $request) {
		$processo = Processo::find($id);
		return $this->salvar($processo, $request);
	}

	public function remover ($id) {
		$processo = Processo::find($id);
		$processo->delete();
		return redirect('api/processo/listar');
	}

	public function salvar (Request $request) {

		// return $request->input();
		$processo = new Processo();

		$processo->descricao  = $request->input('descricao');
		$processo->assunto_id = $request->input('assunto');
		//return response()->json($processo);
		$processo->save();

		$anexos = $request->file('anexos');

		foreach($anexos as $anexo) {
			$arquivo = new Arquivo();

			$arquivo->nome = $anexo->getClientOriginalName();
			$arquivo->processo_id = $processo->id;
			$arquivo->save();
		}

		return response()->json($processo);
	}
}
