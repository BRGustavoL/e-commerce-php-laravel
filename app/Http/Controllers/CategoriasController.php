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
}
