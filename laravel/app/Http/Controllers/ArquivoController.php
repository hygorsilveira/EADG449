<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arquivo;

class ArquivoController extends Controller
{
	public function listar () {
		return Arquivo::all();
	}

	public function criar (Request $request) {
		$arquivo = new Arquivo();
		return $this->salvar($arquivo, $request);
	}

	public function editar ($id, Request $request) {
		$arquivo = Arquivo::find($id);
		return $this->salvar($arquivo, $request);
	}

	public function remover ($id) {
		$arquivo = Arquivo::find($id);
		$arquivo->delete();
		return redirect('api/arquivo/listar');
	}

	private function salvar (Arquivo $arquivo, Request $request) {

		$arquivo->nome     = $request->nome;
		$arquivo->processo_id = $request->assunto_id;
		$arquivo->save();

		return redirect('api/arquivo/listar');
	}
}
