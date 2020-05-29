<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['jwt.verify']], function() {
    
       
});

Route::group(['middleware' => 'cors'], function(){

Route::get('/ambito_impuestos', 'AmbitoImpuestoController@index')->name('ambito.all');
Route::get('/calculo_impuestos', 'CalculoImpuestoController@index')->name('calculo.all');

Route::get('/impuestos', 'ImpuestoController@index')->name('impuesto.all');
Route::post('/impuestos', 'ImpuestoController@store')->name('impuesto.store');
Route::get('/impuestos/{impuesto}', 'ImpuestoController@show')->name('impuesto.show');
Route::put('/impuestos/{impuesto}', 'ImpuestoController@update')->name('impuesto.update');
Route::delete('/impuestos/{impuesto}', 'ImpuestoController@destroy')->name('impuesto.destroy');

Route::get('/roles', 'RoleController@index')->name('role.all');
Route::get('/tipo', 'TipoIdController@index')->name('tipo.all');

Route::get('/usuarios', 'UsuarioController@index')->name('usuario.all');
Route::post('/usuarios', 'UsuarioController@store')->name('usuario.store');
Route::post('/login', 'UsuarioController@authenticate')->name('usuario.authenticate');
Route::get('profile', 'UsuarioController@getAuthenticatedUser');


});
