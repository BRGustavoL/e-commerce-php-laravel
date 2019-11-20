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
Route::get('/loggout', ['uses' => 'Controller@loggout']);
//Route Loja
Route::get('/', ['uses' => 'LojaController@produtos_loja_destaque']);
Route::get('/detalhe_produto/{id}', ['uses' => 'ProdutosController@detalhe_produto']);
Route::get('/produtos_por_categoria/{id}', ['uses' => 'ProdutosController@produtos_por_categoria']);
Route::get('/produtos_por_categoria_select', ['uses' => 'ProdutosController@produtos_por_categoria_select']);

Route::get('/cria_pedido/{id}', ['uses' => 'ProdutosController@cria_pedido']);
Route::get('/carrinho', ['uses' => 'ProdutosController@carrinho']);
Route::get('/exclui_pedido/{id}', ['uses' => 'ProdutosController@exclui_pedido']);

//Route Dashboard ADMIN
Route::get('/dashboard', ['uses' => 'Controller@dashboard']);
Route::get('/dashboard_loggout', ['uses'=>'LojaController@dashboard_loggout']);

//Route Produtos (Dashboard ADMIN)
Route::get('/produtos', ['uses' => 'ProdutosController@produtos']);
Route::get('/cadastro_produto', ['uses' => 'ProdutosController@cadastro_produto']);
Route::post('/criar_produto', ['uses' => 'ProdutosController@criar_produto']);
Route::get('/deleta_produto/{id}', ['uses' => 'ProdutosController@deleta_produto']);
Route::get('/destaca_produto/{id}', ['uses' => 'ProdutosController@destaca_produto']);
Route::get('/remover_destaque_produto/{id}', ['uses' => 'ProdutosController@remover_destaque_produto']);

//Route Categorias (Dashboard ADMIN)
Route::get('/categorias', ['uses' => 'CategoriasController@categorias']);
Route::get('/cadastro_categoria', ['uses' => 'CategoriasController@cadastro_categoria']);
Route::post('/criar_categoria', ['uses' => 'CategoriasController@criar_categoria']);
Route::get('/deleta_categoria/{id}', ['uses' => 'CategoriasController@deleta_categoria']);
Route::get('/edita_categoria/{id}', ['uses' => 'CategoriasController@edita_categoria']);
Route::put('/salva_edicao_categoria', ['uses' => 'CategoriasController@salva_edicao_categoria']);

//Route Usuários (Dashboard ADMIN)
Route::get('/usuarios', ['uses' => 'UsuariosController@usuarios']);
Route::get('/cadastro_usuario', ['uses' => 'UsuariosController@cadastro_usuario']);
Route::post('/criar_usuario', ['uses' => 'UsuariosController@criar_usuario']);
Route::get('/deleta_usuario/{id}', ['uses' => 'UsuariosController@deleta_usuario']);

//Route Usuário (Login)
Route::get('/login', ['uses' => 'LoginController@usuario_login']);
Route::get('/cadastro', ['uses' => 'LoginController@usuario_cadastro']);
Route::post('/insert_usuario', ['uses' => 'LoginController@insert_usuario']);
Route::post('/valida_login_usuario', ['uses' => 'LoginController@valida_login_usuario']);
Route::get('/valida_loggout_usuario', ['uses' => 'LoginController@valida_loggout_usuario']);
Route::get('/esqueci_minha_senha', ['uses' => 'LoginController@esqueci_minha_senha']);
Route::post('/reset_senha', ['uses' => 'LoginController@reset_senha']);


//Route Dashboard Cliente
Route::get('/dashboard_cliente', ['uses' => 'DashboardClientController@dashboard_cliente']);

//Route Minha Conta (Dashboard Usuário)
Route::get('/minha_conta', ['uses' => 'DashboardClientController@minha_conta']);
Route::get('/editar_minha_conta', ['uses' => 'DashboardClientController@editar_minha_conta']);
Route::put('/salvar_minha_conta', ['uses' => 'DashboardClientController@salvar_minha_conta']);


//Route Meus Pedidos (Dashboard Usuário)
Route::get('/meus_pedidos', ['uses' => 'DashboardClientController@meus_pedidos']);

//Route Compras
Route::get('/confirmar_pedido', ['uses' => 'ProdutosController@confirmar_pedido']);


