<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Processo;

class ProcessoController extends Controller
{
	public function listar () {
		return Processo::all();
	}

	public function criar (Request $request) {
		$processo = new Processo();
		return $this->salvar($processo, $request);
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

	private function salvar (Processo $processo, Request $request) {

		$processo->numero     = $request->numero;
		$processo->data       = $request->data;
		$processo->descricao  = $request->descricao;
		$processo->assunto_id = $request->assunto_id;
		$processo->save();

		return redirect('api/processo/listar');
	}
}
