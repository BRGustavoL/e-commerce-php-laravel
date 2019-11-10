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

class LojaController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function produtos_loja_destaque() {
    $produtos = DB::table('produtos')
    ->select('prod_id', 'prod_nome', 'prod_preco', 'prod_imagem')
    ->where('prod_isDestaque', '=', 0)
    ->get();

    $produtos_destaque = DB::table('produtos')
    ->select('prod_id', 'prod_nome', 'prod_preco', 'prod_imagem')
    ->where('prod_isDestaque', '=', 1)
    ->get();
    return view('loja.loja', ['produtos'=>$produtos, 'produtos_loja_destaque'=>$produtos_destaque]);
  }
}
