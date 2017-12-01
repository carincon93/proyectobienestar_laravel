<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication Routes...
Auth::routes();

// Index
Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'admin'], function() {

	Route::get('/', function() {
		return redirect('admin/dashboard');
	});
	Route::get('dashboard', 'AdminController@index');
	Route::get('reportes', function() {
		return view('reportes.reportes');
	});

	// Aprendiz
	Route::resource('aprendiz','AprendizController');
	// Historial
	Route::resource('registro_historico','RegistroHistoricoController');
    // Aceptar o cancelar solicitud de aprendiz
	Route::post('aprendiz_solicitud/{id}', 'AprendizController@solicitud');

	Route::post('truncate', 'AdminController@truncateAll');
	Route::get('sistema', 'AdminController@view_sistema');

	// Importar aprendices
	Route::post('aprendiz/store_import', 'AprendizController@store_import');

	Route::get('obtener_solicitud', 'AprendizController@obtener_solicitud');
	Route::get('{id}/solicitudaceptado', 'AprendizController@solicitudAceptado');

	Route::get('excel','AprendizController@excel');

	Route::get('datesearch','RegistroHistoricoController@datesearch');

	Route::get('excel','AprendizController@excel');
	Route::post('generar_reporte','RegistroHistoricoController@generar_reporte');


	// Cambio de contraseña
	Route::get('password', 'AdminController@password');
	Route::post('updatepassword', 'AdminController@updatePassword');
});

Route::get('buscar_aprendiz','AprendizController@ajax');
Route::post('{id}/entrega_suplemento', 'AprendizController@entrega_suplemento');

Route::post('registro_historico/store/{id}', 'RegistroHistoricoController@store');
Route::delete('registro_historico/{id}','RegistroHistoricoController@destroy');

Route::get('obtener_historial','RegistroHistoricoController@obtener_historial');

// Redirección - Error 404
Route::get('error', function()
{
	return Response::view('error.error404', array(), 404);
});
