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


Route::resource('/', 'HomeController');
Route::get('home_Merc', 'HomeController@returnMerc')->name('home.returnMerc');
Route::post('/home_Merc', 'HomeController@returnMerc')->name('home.returnMerc');

Route::get('home_Hort', 'HomeController@returnHort')->name('home.returnHort');
Route::post('/home_Hort', 'HomeController@returnHort')->name('home.returnHort');

Route::get('home_Acou', 'HomeController@returnAcou')->name('home.returnAcou');
Route::post('/home_Acou', 'HomeController@returnAcou')->name('home.returnAcou');

Route::get('home_Pad', 'HomeController@returnPad')->name('home.returnPad');
Route::post('/home_Pad', 'HomeController@returnPad')->name('home.returnPad');

Route::get('home_Beb', 'HomeController@returnBeb')->name('home.returnBeb');
Route::post('/home_Beb', 'HomeController@returnBeb')->name('home.returnBeb');

Route::get('home_Hig', 'HomeController@returnHig')->name('home.returnHig');
Route::post('/home_Hig', 'HomeController@returnHig')->name('home.returnHig');

Route::get('home_Lim', 'HomeController@returnLim')->name('home.returnLim');
Route::post('/home_Lim', 'HomeController@returnLim')->name('home.returnLim');

Route::get('home_Inf', 'HomeController@returnInf')->name('home.returnInf');
Route::post('/home_Inf', 'HomeController@returnInf')->name('home.returnInf');

Route::get('home_Ele', 'HomeController@returnEle')->name('home.returnEle');
Route::post('/home_Ele', 'HomeController@returnEle')->name('home.returnEle');

Route::get('home_Pesquisa', 'HomeController@returnPesquisa')->name('home.returnPesquisa');
Route::post('/home_Pesquisa', 'HomeController@returnPesquisa')->name('home.returnPesquisa');

Route::resource('/home', 'HomeController');

Route::resource('/carrinho', 'CarrinhoController')->middleware('auth');

Route::resource('/UserArea', 'UserAreacontroller')->middleware('auth');

Route::group(['middleware' => ['auth','check.permission']], function () {
	Route::get('AdminArea_Cliente','AdminController@showCliente')->name('AdminArea.showCliente');
	Route::post('/AdminArea_Cliente','AdminController@showCliente')->name('AdminArea.showCliente');
	Route::delete('/AdminArea_Produto','AdminController@excluiProduto')->name('AdminArea.excluiProduto');
	Route::resource('/AdminArea', 'Admincontroller')->middleware('auth');
	
});