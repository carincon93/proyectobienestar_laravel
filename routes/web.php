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
Auth::routes();

// Welcome
Route::get('/', 'WelcomeController@index')->name('welcome');

// Admin
Route::get('/admin', function () {
	return redirect('admin/dashboard');
});

Route::get('/admin/dashboard', 'AdminController@index');
Route::post('/admin/truncate', 'AdminController@truncateAll');

// Collaborador
Route::resource('/admin/collaborator', 'CollaboratorController');

// Importar aprendices
Route::get('/admin/apprentice/import', 'ApprenticeController@import');
Route::post('/admin/apprentice/store_import', 'ApprenticeController@store_import');
// Aprendiz
Route::resource('/admin/apprentice','ApprenticeController');
Route::get('/apprenticeajax','ApprenticeController@ajax');
Route::get('/obtener_solicitud', 'ApprenticeController@obtener_solicitud');
Route::get('/admin/{id}/solicitudaceptado', 'ApprenticeController@solicitudAceptado');
Route::get('/admin/{id}/solicitudrechazado', 'ApprenticeController@solicitudRechazado');
Route::get('/admin/{id}/entrega_suplemento', 'ApprenticeController@entrega_suplemento');

// Historial
Route::resource('/admin/history_record','HistoryRecordController');
Route::post('/history_record/store/{id}', 'HistoryRecordController@store');
Route::post('/datesearch','HistoryRecordController@datesearch');
Route::get('/excel','HistoryRecordController@excel');

// Cambio de contraseña
Route::get('admin/password', 'AdminController@password');
Route::post('admin/updatepassword', 'AdminController@updatePassword');

// Redirección - Error 404
Route::get('error', function()
{
	return Response::view('error.error404', array(), 404);
});
