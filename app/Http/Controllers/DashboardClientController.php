<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use DB;
use Cookie;

class DashboardClientController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function dashboard_cliente() {
    return view('dashboard_client.dashboard_client');
  }

  public function minha_conta() {
    $user_cookie = Cookie::get('user');
    $dados_conta = DB::table('usuarios')
    ->select('*')
    ->where('usu_login', '=', $user_cookie)
    ->get();
    return view('dashboard_client.minha_conta.minha_conta', ['dados'=>$dados_conta]);
  }

  public function meus_pedidos() {
    $user_cookie = Cookie::get('user');
    $dados_conta = DB::table('usuarios')
    ->select('usu_id')
    ->where('usu_login', '=', $user_cookie)
    ->get();
    foreach ($dados_conta as $dado) {
      $dado_id = $dado->usu_id;
    }
    $meus_pedidos = DB::table('pedidos')
    ->select('*')
    ->where('ped_usuario', $dado_id)
    ->get();
    return view('dashboard_client.meus_pedidos.meus_pedidos', ['meus_pedidos'=>$meus_pedidos]);
  }

  public function editar_minha_conta() {
    $user_cookie = Cookie::get('user');
    if($user_cookie) {
      $dados_conta_editar = DB::table('usuarios')
      ->select('*')
      ->where('usu_login', '=', $user_cookie)
      ->get();
      return view('dashboard_client.minha_conta.editar_minha_conta', ['dados_editar'=>$dados_conta_editar]);
    }
    return redirect('');
  }

  public function salvar_minha_conta(Request $req) {
    $user_cookie = Cookie::get('user');
    if($user_cookie) {
      $usu_id = $req->input('usu_id');
      $usu_login = $req->input('usu_login');
      $usu_email = $req->input('usu_email');
      $usu_senha = $req->input('usu_senha');
      $usu_telefone = $req->input('usu_telefone');
      $usu_cep = $req->input('usu_cep');
      $usu_complemento = $req->input('usu_complemento');
      DB::table('usuarios')
      ->where('usu_id', $usu_id)
      ->update(array('usu_login'=>$usu_login, 'usu_email'=>$usu_email, 'usu_senha'=>$usu_senha));
      Cookie::queue('user', $usu_login, 120);		
    }
    return redirect('minha_conta');
  }
}
