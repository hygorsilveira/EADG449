<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tramite;

class TramiteController extends Controller
{
	public function listar () {
		return Tramite::all();
	}

	public function criar (Request $request) {
		$tramite = new Tramite();
		return $this->salvar($tramite, $request);
	}

	public function editar ($id, Request $request) {
		$tramite = Tramite::find($id);
		return $this->salvar($tramite, $request);
	}

	public function remover ($id) {
		$tramite = Tramite::find($id);
		$tramite->delete();
		return redirect('api/tramite/listar');
	}

	private function salvar (Tramite $tramite, Request $request) {

		$tramite->processo_id = $request->processo_id;
		$tramite->unidade_id  = $request->unidade_id;
		$tramite->save();

		return redirect('api/tramite/listar');
	}
}
