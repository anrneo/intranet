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

Route::get('/', 'HomeController@index');
Route::get('/excel', 'HomeController@excel');


Route::get('/zeus1', function(){
    return view('zeus');
});

Route::get('/ajax', 'HomeController@ajax');


Auth::routes();

//certificado laboral
Route::get('/certificado', 'HomeController@certificado')->middleware('auth');
//admin parsf
Route::get('/adminpqrsf', 'pqrdatController@adminpqrsf')->middleware('auth');
Route::get('/videopqrsf', 'pqrdatController@videopqrsf')->middleware('auth');

//Rutas
Route::middleware(['auth'])->group(function() {


    
    //-->Ruta para cumpleaños 
    Route::get('/felicita/{id}', 'HomeController@felicita');
    Route::get('/borrarfeli/{id}', 'HomeController@borrarfeli');


    //helpdesk
    Route::get('/reportar', 'HelpController@getreportar')->name('home');
    Route::post('/reportar', 'HelpController@postreportar')->name('reportarhd');
    Route::get('/consultar', 'HelpController@consultar');
    Route::get('/admin', 'HelpController@admin')->name('adminhd');
    Route::get('/responder/{id}', 'HelpController@getresponder');
    Route::post('/responder/{id}', 'HelpController@postresponder');
    Route::get('/descargar/{id}', 'HelpController@descargar');
    Route::post('/asignarhelp', 'HelpController@postasignarhelp');
    Route::get('/resasignacionhd', 'HelpController@resasignacionhd');
    Route::post('/aprobarhelp', 'HelpController@aprobarhelp');
    Route::get('/matriz', 'HelpController@matriz');
    Route::post('/documentar', 'HelpController@documentar');
    Route::get('/borrarhd/{id}', 'HelpController@borrarhd');
    Route::get('/mail', 'HelpController@mail');
    Route::get('/videoreportar', 'HelpController@videoreportar');
    Route::post('/cambioarea', 'HelpController@cambioarea');
    Route::get('/test', 'HelpController@test');


    //Novedades
    Route::get('/gh/novedades/admin', 'NovedadesController@admin');
    Route::get('/gh/novedades/create', 'NovedadesController@create');

//-->Ruta para Gestión Documental    
Route::get('descargar/{id}', 'DocumentController@descargar');
Route::get('/documento/home', 'DocumentController@principal')->name('documentos.home');
Route::get('/documento/sub/{area}', 'DocumentController@sub')->name('documentos.sub');
Route::get('/documento/{area}/reporte/{tipo}', 'DocumentController@reporte')->name('documentos.reporte');
Route::get('documento', 'DocumentController@index')->name('documento.index');
Route::post('documento', 'DocumentController@create')->name('documento.create');



    //Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
    ->middleware('permission:roles.create');
    
    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');
    
    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');
    
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');
    
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');
    
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');
    
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit'); 

    //Pqrdats

    Route::post('pqrdats/store', 'pqrdatController@store')->name('pqrdats.store')
        ->middleware('permission:pqrdats.create');


    Route::get('pqrdats', 'pqrdatController@index')->name('pqrdats.index')
        ->middleware('permission:pqrdats.index');


    Route::get('pqrdats/create', 'pqrdatController@create')->name('pqrdats.create')
        ->middleware('permission:pqrdats.create');

    //Route::post('pqrdats', 'pqrdatController@store');


    Route::put('pqrdats/{pqrdat}', 'pqrdatController@update')->name('pqrdats.update')
        ->middleware('permission:pqrdats.edit');


    Route::get('pqrdats/{pqrdat}', 'pqrdatController@show')->name('pqrdats.show')
        ->middleware('permission:pqrdats.show');


    Route::get('pqrdats/{pqrdat}/edit', 'pqrdatController@edit')->name('pqrdats.edit')
        ->middleware('permission:pqrdats.edit'); 


    //Route::delete('roles/{pqrdat}', 'pqrdatController@destroy')->name('pqrdats.destroy')
      //  ->middleware('permission:pqrdats.destroy');

    //Usuarios

    Route::post('users/store', 'userController@store')->name('users.store')
        ->middleware('permission:users.create');


    Route::get('users', 'userController@index')->name('users.index')
        ->middleware('permission:users.index');


    Route::get('users/create', 'userController@create')->name('users.create')
        ->middleware('permission:users.create');


    Route::put('users/{user}', 'userController@update')->name('users.update')
        ->middleware('permission:users.edit');

        Route::post('users/{user}', 'userController@updatepass')->name('users.updatepass')
        ->middleware('permission:users.edit');
        
    Route::get('users/{user}', 'userController@show')->name('users.show')
        ->middleware('permission:users.show');


    Route::delete('users/{user}', 'userController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');


    Route::get('users/{user}/edit', 'userController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

    

});