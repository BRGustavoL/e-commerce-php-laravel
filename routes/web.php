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

//Route Loja
Route::get('/', ['uses' => 'LojaController@produtos_loja_destaque']);
Route::get('/detalhe_produto/{id}', ['uses' => 'ProdutosController@detalhe_produto']);

//Route Dashboard
Route::get('/dashboard', ['uses' => 'Controller@dashboard']);

//Route Produtos (Dashboard)
Route::get('/produtos', ['uses' => 'ProdutosController@produtos']);
Route::get('/cadastro_produto', ['uses' => 'ProdutosController@cadastro_produto']);
Route::post('/criar_produto', ['uses' => 'ProdutosController@criar_produto']);
Route::get('/deleta_produto/{id}', ['uses' => 'ProdutosController@deleta_produto']);
Route::get('/destaca_produto/{id}', ['uses' => 'ProdutosController@destaca_produto']);
Route::get('/remover_destaque_produto/{id}', ['uses' => 'ProdutosController@remover_destaque_produto']);


//Route Categorias (Dashboard)
Route::get('/categorias', ['uses' => 'CategoriasController@categorias']);
Route::get('/cadastro_categoria', ['uses' => 'CategoriasController@cadastro_categoria']);
Route::post('/criar_categoria', ['uses' => 'CategoriasController@criar_categoria']);
Route::get('/deleta_categoria/{id}', ['uses' => 'CategoriasController@deleta_categoria']);

//Route Usuários (Dashboard)
Route::get('/usuarios', ['uses' => 'UsuariosController@usuarios']);
Route::get('/cadastro_usuario', ['uses' => 'UsuariosController@cadastro_usuario']);
Route::post('/criar_usuario', ['uses' => 'UsuariosController@criar_usuario']);
Route::get('/deleta_usuario/{id}', ['uses' => 'UsuariosController@deleta_usuario']);

//Route Usuário (Login)
Route::get('/login', ['uses' => 'LoginController@usuario_login']);
Route::get('/cadastro', ['uses' => 'LoginController@usuario_cadastro']);
Route::post('/insert_usuario', ['uses' => 'LoginController@insert_usuario']);
Route::post('/valida_login_usuario', ['uses' => 'LoginController@valida_login_usuario']);