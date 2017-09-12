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
	// Auth::routes();
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Welcome
Route::get('/', 'WelcomeController@index')->name('welcome');


// Admin
Route::get('/admin', function () {
	return redirect('admin/dashboard');
});
Route::post('admin/aprendiz_solicitud/{id}', 'ApprenticeController@solicitud');

Route::get('/admin/dashboard', 'AdminController@index');
Route::post('/admin/truncate', 'AdminController@truncateAll');

// Collaborador
Route::resource('/admin/collaborator', 'CollaboratorController');

// Importar aprendices
Route::get('/admin/sistema', 'AdminController@view_sistema');
Route::post('/admin/apprentice/store_import', 'ApprenticeController@store_import');
// Aprendiz
Route::resource('/admin/apprentice','ApprenticeController');
Route::get('/apprenticeajax','ApprenticeController@ajax');
Route::get('/obtener_solicitud', 'ApprenticeController@obtener_solicitud');
Route::get('/admin/{id}/solicitudaceptado', 'ApprenticeController@solicitudAceptado');
Route::get('/admin/{id}/entrega_suplemento', 'ApprenticeController@entrega_suplemento');
Route::get('/excel','ApprenticeController@excel');

// Historial
Route::resource('/admin/history_record','HistoryRecordController');
Route::post('/history_record/store/{id}', 'HistoryRecordController@store');
Route::get('/datesearch','HistoryRecordController@datesearch');

Route::get('/excel','ApprenticeController@excel');
Route::post('/generar_reporte','HistoryRecordController@generar_reporte');

Route::get('/obtener_historial','HistoryRecordController@obtener_historial');
Route::delete('/admin/history_records/{id}','HistoryRecordController@destroy');



// Cambio de contraseña
Route::get('admin/password', 'AdminController@password');
Route::post('admin/updatepassword', 'AdminController@updatePassword');




// Redirección - Error 404
Route::get('error', function()
{
	return Response::view('error.error404', array(), 404);
});
