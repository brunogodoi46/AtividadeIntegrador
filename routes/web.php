<?php

use Illuminate\Support\Facades\Route;
use App\TipoProduto;
use App\Produto;


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

Route::resource('tipoproduto', 'TipoProdutoController');
Route::resource('produto', 'ProdutoController');

//Rotas para o controlador Pedido.
Route::get('/pedido', 'PedidoController@index')->name('pedido.index');
Route::post('/pedido/{endereco_id}', 'PedidoController@store')->name('pedido.store');

//Rotas para o controlador PedidoProduto.
Route::get('/pedidoproduto/getTodosProdutosDeTipo/{produto_id}', 'PedidoProdutoController@getTodosProdutosDeTipo')->name('pedidoproduto.getTodosProdutosDeTipo');

//Rota para o controlador Endereco.

Route::resource('/endereco', 'EnderecoController');