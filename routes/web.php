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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


	Route::resource('medicamento', 'MedicamentoController');
	Route::resource('pedido', 'PedidoController');
});

Route::get('/cria', function () {
    for($i = 0; $i < 15; $i++) {
        $pedido = new \App\Pedido();
        $pedido->ped_hash = "0000" . rand(1000, 9999);
        $pedido->ped_preco = 10.00;
        $pedido->ped_status = rand(1,5);
        $pedido->save();
    }
});

