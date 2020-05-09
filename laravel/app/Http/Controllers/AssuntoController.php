<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assunto;

class AssuntoController extends Controller
{
	public function listar () {
		return Assunto::all();
	}

	public function criar (Request $request) {
		$assunto = new Assunto();
		return $this->salvar($assunto, $request);
	}

	public function editar ($id, Request $request) {
		$assunto = Assunto::find($id);
		return $this->salvar($assunto, $request);
	}

	public function remover ($id) {
		$assunto = Assunto::find($id);
		$assunto->delete();
		return redirect('api/assunto/listar');
	}

	private function salvar (Assunto $assunto, Request $request) {

		$assunto->nome     = $request->nome;
		$assunto->situacao = $request->situacao;
		$assunto->save();

		return redirect('api/assunto/listar');
	}
}
