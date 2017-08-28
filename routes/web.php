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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//admin
Route::get('/admin', 'AdminController@index');
Route::post('/admin/import', 'AdminController@import');
Route::resource('/admin/collaborator', 'CollaboratorController');
Route::post('/admin/truncate', 'AdminController@truncateall');
//aprendiz
Route::resource('/admin/apprentice','ApprenticeController');

//cambio de contraseña
Route::get('admin/password', 'AdminController@password');
Route::post('admin/updatepassword', 'AdminController@updatePassword');


Route::get('/admin', 'AdminController@index');
Route::get('/admin/{id}/solicitudaceptado', 'AdminController@solicitudAceptado');
Route::get('/admin/{id}/solicitudrechazado', 'AdminController@solicitudRechazado');

// Redirección - Error 404
Route::get('error', function()
{
	return Response::view('error.error404', array(), 404);
});
