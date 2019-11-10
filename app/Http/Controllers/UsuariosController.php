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
}