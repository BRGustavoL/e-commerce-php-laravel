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

class ProdutosController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
    $file = $prod_imagem;
    $extension = $prod_imagem->getClientOriginalExtension();
    $fileName = time() . random_int(100, 999) .'.' . $extension; 
    $destinationPath = public_path('images/');
    $url = 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$fileName;
    $fullPath = $destinationPath.$fileName;
    if (!file_exists($destinationPath)) {
      File::makeDirectory($destinationPath, 0775);
    }
    $produto = array('prod_nome'=>$prod_nome, 'prod_categoria'=>$prod_categoria, 
    'prod_quantidade'=>$prod_quantidade, 'prod_preco'=>$prod_preco, 'prod_imagem'=>$fullPath);
    DB::table('produtos')->insert($produto);
    return redirect('produtos');
  }
}