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

class UsuariosController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function usuarios() {
    $usuarios = DB::table('usuarios')
    ->select('*')
    ->get();
    return view('dashboard.usuarios.usuarios', ['usuarios' => $usuarios]);    
  }

  public function cadastro_usuario() {
    return view('dashboard.usuarios.cadastrar');
  }
  
  public function criar_usuario(Request $req) {
    $usu_login = $req -> input('usu_login');
    $usu_email = $req -> input('usu_email');
    $usu_senha = $req -> input('usu_senha');
    $usu_senha_cript = md5($usu_senha);
    $usuario = array('usu_login'=>$usu_login, 'usu_senha'=>$usu_senha_cript, 'usu_email'=>$usu_email);
    DB::table('usuarios')->insert($usuario);
    return redirect('usuarios');
  }

  public function deleta_usuario($id) {
    DB::table('usuarios')
    ->where('usu_id', '=', $id)
    ->delete();
    return redirect('usuarios');
  }

  public function edita_usuario($id) {
    $query_edita = DB::table('usuarios')
    ->select('usu_id', 'usu_login', 'usu_email', 'usu_senha')
    ->where('usu_id', $id)
    ->get();
    return view('dashboard.usuarios.editar', ['usuario'=>$query_edita]);
  }

  public function salva_edicao_usuario(Request $req) {
    $usu_id_edit = $req -> input('usu_id_edit');
    $usu_login_edit = $req -> input('usu_login_edit');
    $usu_email_edit = $req -> input('usu_email_edit');
    $usu_senha_edit = $req -> input('usu_senha_edit');
    DB::table('usuarios')
    ->where('usu_id', $usu_id_edit)
    ->update(['usu_login'=>$usu_login_edit, 'usu_email'=>$usu_email_edit, 'usu_senha'=>$usu_senha_edit]);
    Cookie::queue('user', $usu_login_edit, 120);		
    return redirect('usuarios');
  }
}