<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;

class UnidadeController extends Controller
{
	public function listar () {
		return Unidade::all();
	}

	public function criar (Request $request) {
		$unidade = new Unidade();
		return $this->salvar($unidade, $request);
	}

	public function editar ($id, Request $request) {
		$unidade = Unidade::find($id);
		return $this->salvar($unidade, $request);
	}

	public function remover ($id) {
		$unidade = Unidade::find($id);
		$unidade->delete();
		return redirect('api/unidade/listar');
	}

	private function salvar (Unidade $unidade, Request $request) {

		$unidade->nome     = $request->nome;
		$unidade->sigla    = $request->sigla;
		$unidade->situacao = $request->situacao;
		$unidade->save();

		return redirect('api/unidade/listar');
	}
}
