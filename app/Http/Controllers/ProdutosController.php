<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;
use Cookie;

class ProdutosController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function produtos_por_categoria($id) {
    
  }

  public function produtos_por_categoria_select() {
    $select_categorias = DB::table('categorias')
    ->select('*')
    ->get();

    return view('loja.produtos_por_categoria', ['select_categorias'=>$select_categorias]);
  }

  public function produtos() {
    $produtos = DB::table('produtos as p')
    ->select('p.prod_id','p.prod_nome', 'c.cate_nome', 'p.prod_quantidade', 'p.prod_preco', 'p.prod_vendidos', 'p.prod_isDestaque', 'p.prod_isLancamento')
    ->join('categorias as c', 'p.prod_categoria', '=', 'c.cate_id')
    ->get();
    return view('dashboard.produtos.produtos', ['produtos' => $produtos]);
  }

  public function deleta_produto($id) {
    DB::table('produtos')
    ->where('prod_id', '=', $id)
    ->delete();
    return redirect('produtos');
  }

  public function destaca_produto($id) {
    DB::table('produtos')
    ->where('prod_id', '=', $id)
    ->update(['prod_isDestaque' => 1]);
    return redirect('produtos');
  }

  public function remover_destaque_produto($id) {
    DB::table('produtos')
    ->where('prod_id', '=', $id)->update([
        'prod_isDestaque' => 0
    ]);
    return redirect('produtos');
  }

  public function cadastro_produto() {
    $categorias = DB::table('categorias')
    ->select('*')
    ->get();
    return view('dashboard.produtos.cadastrar', ['categorias' => $categorias]);
  }

  public function criar_produto(Request $req) {
    $prod_nome = $req -> input('prod_nome');
    $prod_categoria = $req -> input('prod_categoria');
    $prod_quantidade = $req -> input('prod_quantidade');
    $prod_preco = $req -> input('prod_preco');
    $prod_imagem = $req -> file('prod_imagem');
    $extension = $prod_imagem->getClientOriginalExtension();
    $filename =time().'.'.$extension;
    $prod_imagem->move('images/', $filename);
    $db_imagem_path = 'images/'.$filename;
    $produto = array('prod_nome'=>$prod_nome, 'prod_categoria'=>$prod_categoria, 
    'prod_quantidade'=>$prod_quantidade, 'prod_preco'=>$prod_preco, 'prod_imagem'=>$db_imagem_path);
    DB::table('produtos')->insert($produto);
    return redirect('produtos');
  }

  public function detalhe_produto($id) {
    $produto_detalhado = DB::table('produtos')
    ->select('prod_id', 'prod_nome', 'prod_categoria', 'prod_quantidade', 'prod_preco', 'prod_imagem')
    ->where('prod_id', $id)
    ->get();
    return view('loja.detalhe_produto.detalhe_produto', ['produto_detalhado' => $produto_detalhado]);
  }

  public function cria_pedido(Request $req, $prod_id) {
    $user_cookie = Cookie::get('user');
    if($user_cookie) {
      $produto = DB::table('produtos')
      ->select('prod_id', 'prod_preco')
      ->where('prod_id', $prod_id)
      ->get();
      $usuario = DB::table('usuarios')
      ->select('usu_id')
      ->where('usu_login', $user_cookie)
      ->get();
      $ped_quantidade = $req->input('ped_quantidade');
      $ped_cep = $req->input('ped_cep');
      foreach ($produto as $prod) {
        $produto_id = $prod->prod_id;
        $produto_unitario = $prod->prod_preco;
      }
      foreach ($usuario as $usu) {
        $usuario_id = $usu->usu_id;
      }
      $ped_total = $produto_unitario * 1;
      $ped_date = date('Y-m-d');

      $pedido = array('ped_produto'=>$produto_id, 'ped_usuario'=>$usuario_id, 'ped_quantidade'=>'1', 'ped_unitario'=>$produto_unitario, 'ped_total'=>$ped_total, 'ped_cep'=>'89803210', 'ped_status'=>'Pendente', 'ped_criado'=>$ped_date);
      DB::table('pedidos')
      ->insert($pedido);
      return redirect('carrinho');
    }
    return redirect('');
  }

  public function carrinho() {
    $user_cookie = Cookie::get('user');
    if($user_cookie) {
      $usuario = DB::table('usuarios')
      ->select('usu_id')
      ->where('usu_login', $user_cookie)
      ->get();
      foreach ($usuario as $usu) {
        $user_id = $usu->usu_id;
      }
      $pedidos = DB::table('pedidos')
      ->select('*')
      ->where(['ped_usuario'=>$user_id, 'ped_status'=>'Pendente'])
      ->get();
      return view('loja.finalizar_compra.finalizar_compra', ['pedidos'=>$pedidos]);
    }
    return redirect('');
  }

  public function exclui_pedido($id) {
    DB::table('pedidos')
    ->where('ped_id', $id)
    ->delete();
    return redirect('/');
  }

  public function confirmar_pedido() {
    $user_cookie = Cookie::get('user');
    if($user_cookie) {
      $usuario = DB::table('usuarios')
      ->select('usu_id')
      ->where('usu_login', $user_cookie)
      ->get();
      foreach ($usuario as $usu) {
        $user_id = $usu->usu_id;
      }
      $pedidos = DB::table('pedidos')
      ->where('ped_usuario', $user_id)
      ->update(['ped_status' => 'Pendente pagamento']);
      $quantidade = DB::table('pedidos')
      ->select('ped_produto', 'ped_quantidade')
      ->where('ped_usuario', $user_id)
      ->get();
      foreach ($quantidade as $qtd) {
        $cod_produto = $qtd->ped_produto;
        $qtd_vendida = $qtd->ped_quantidade;
      }
      $quantidade_estoque = DB::table('produtos')
      ->select('prod_vendidos')
      ->where('prod_id', $cod_produto)
      ->get();
      foreach ($quantidade_estoque as $qtd_est) {
        $qtd_atual = $qtd_est->prod_vendidos;
      }
      $qtd_vendida = $qtd_atual + $qtd_vendida;
      DB::table('produtos')
      ->where('prod_id', $cod_produto)
      ->update(['prod_vendidos'=>$qtd_vendida]);
      return redirect('/');
    }
  }

}
