<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'prefix' => 'arquivo'], function () {
	Route::get('listar',       'ArquivoController@listar');
	Route::get('criar',        'ArquivoController@criar');
	Route::get('{id}/editar',  'ArquivoController@editar');
	Route::get('{id}/remover', 'ArquivoController@remover');
});
Route::group([ 'prefix' => 'assunto'], function () {
	Route::get('listar',       'AssuntoController@listar');
	Route::get('criar',        'AssuntoController@criar');
	Route::get('{id}/editar',  'AssuntoController@editar');
	Route::get('{id}/remover', 'AssuntoController@remover');
});
Route::group([ 'prefix' => 'processo'], function () {
	Route::get('listar',       'ProcessoController@listar');
	Route::get('criar',        'ProcessoController@criar');
	Route::get('{id}/editar',  'ProcessoController@editar');
	Route::get('{id}/remover', 'ProcessoController@remover');
});
Route::group([ 'prefix' => 'tramite'], function () {
	Route::get('listar',       'TramiteController@listar');
	Route::get('criar',        'TramiteController@criar');
	Route::get('{id}/editar',  'TramiteController@editar');
	Route::get('{id}/remover', 'TramiteController@remover');
});
Route::group([ 'prefix' => 'unidade'], function () {
	Route::get('listar',       'UnidadeController@listar');
	Route::get('criar',        'UnidadeController@criar');
	Route::get('{id}/editar',  'UnidadeController@editar');
	Route::get('{id}/remover', 'UnidadeController@remover');
});
