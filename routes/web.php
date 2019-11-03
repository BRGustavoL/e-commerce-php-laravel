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

Route::get('/', ['uses' => 'Controller@loja']);
Route::get('/login', ['uses' => 'Controller@usuario_login']);
Route::get('/cadastro', ['uses' => 'Controller@usuario_cadastro']);

Route::post('/insert_usuario', ['uses' => 'Controller@insert_usuario']);
Route::post('/valida_login_usuario', ['uses' => 'Controller@valida_login_usuario']);