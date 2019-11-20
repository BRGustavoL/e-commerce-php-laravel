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

class CategoriasController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function categorias() {
    $categorias = DB::table('categorias')
    ->select('*')
    ->get();
    return view('dashboard.categorias.categorias', ['categorias' => $categorias]);
  }

  public function cadastro_categoria() {
    return view('dashboard.categorias.cadastrar');
  }

  public function criar_categoria(Request $req) {
    $cate_nome = $req -> input('cate_nome');
    $categoria = array('cate_nome'=>$cate_nome);
    DB::table('categorias')->insert($categoria);
    return redirect('categorias');
  }

  public function deleta_categoria($id) {
    DB::table('categorias')
    ->where('cate_id', '=', $id)
    ->delete();
    return redirect('categorias');
  }

  public function edita_categoria($id) {
    $dado_categoria = DB::table('categorias')
    ->select('*')
    ->where('cate_id', $id)
    ->get();
    return view('dashboard.categorias.editar', ['categoria'=>$dado_categoria]);
  }

  public function salva_edicao_categoria(Request $req) {
    $cate_id_edit = $req -> input('cate_id_edit');
    $cate_nome_edit = $req -> input('cate_nome_edit');
    DB::table('categorias')
    ->where('cate_id', $cate_id_edit)
    ->update(['cate_nome'=>$cate_nome_edit]);
    return redirect('categorias');
  }
}
