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

Route::get('/cc', 'TiqueteController@cc');

Route::get('/datajax', 'HomeController@datajax');


Route::post('/consultahd', 'HelpController@consultahd');
Route::post('/consubareahd', 'HelpController@consubareahd');

Route::post('/buscaridhd', 'HelpController@buscaridhd');

Route::post('/validaremail', 'HomeController@validaremail');
Route::post('/validarid', 'HomeController@validarid');

Route::post('/likevideo', 'HomeController@likevideo');

