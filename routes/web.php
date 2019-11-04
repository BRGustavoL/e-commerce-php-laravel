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
Route::get('/', ['uses' => 'Controller@loja']);

// Route Dashboard
Route::get('/dashboard', ['uses' => 'Controller@dashboard']);
Route::get('/produtos', ['uses' => 'Controller@produtos']);
Route::get('/categorias', ['uses' => 'Controller@categorias']);

Route::get('/deleta_produto/{id}', ['uses' => 'Controller@deleta_produto']);
Route::get('/destaca_produto/{id}', ['uses' => 'Controller@destaca_produto']);
Route::get('/remover_destaque_produto/{id}', ['uses' => 'Controller@remover_destaque_produto']);


// Route Usuário
Route::get('/login', ['uses' => 'Controller@usuario_login']);
Route::get('/cadastro', ['uses' => 'Controller@usuario_cadastro']);

// Métodos Usuário
Route::post('/insert_usuario', ['uses' => 'Controller@insert_usuario']);
Route::post('/valida_login_usuario', ['uses' => 'Controller@valida_login_usuario']);