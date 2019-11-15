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

    return view('dashboard_client.minha_conta.minha_conta', ['dados'=>$dados_conta]);
  }

  public function editar_minha_conta() {
    $user_cookie = Cookie::get('user');
    $dados_conta_editar = DB::table('usuarios')
    ->select('*')
    ->where('usu_login', '=', $user_cookie)
    ->get();
    return view('dashboard_client.minha_conta.editar_minha_conta', ['dados_editar'=>$dados_conta_editar]);
  }

  public function salvar_minha_conta(Request $req) {
    $usu_id = $req->input('usu_id');
    $usu_login = $req->input('usu_login');
    $usu_email = $req->input('usu_email');
    $usu_senha = $req->input('usu_senha');
    $usu_senha_crypt = md5($usu_senha);
    DB::update('update usuarios set usu_login = ? , usu_email = ?, usu_senha = ? where usu_id = ?', [$usu_login , $usu_email, $usu_senha_crypt, $usu_id]);
    echo $usu_id;
    // DB::table('usuarios')
    // ->where('usu_id', $usu_id)
    // ->update(array('usu_login'=>$usu_login, 'usu_email'=>$usu_email, 'usu_senha'=>$usu_senha_crypt));
    return redirect('minha_conta');
  }
}
