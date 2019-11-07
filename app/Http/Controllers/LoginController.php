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

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function usuario_login() {
			return view('usuario.login.login');
    }

    public function usuario_cadastro() {
			return view('usuario.cadastro.cadastro');
    }

    public function insert_usuario(Request $req) {
			$usu_login = $req -> input('usu_login');
			$usu_senha = $req -> input('usu_senha');
			$data = array('usu_login'=>$usu_login, 'usu_senha'=>$usu_senha);
			DB::table('usuarios')->insert($data);
			return view('usuario.login.login');
    }

    public function valida_login_usuario(Request $req) {
			$usuario = $req -> input('usu_login');
			$senha = $req -> input('usu_senha');
			$admin = "admin";
			$check_login_admin = DB::table('usuarios') -> where(['usu_login'=>$admin, 'usu_senha'=>$admin]) -> get();
			if(count($check_login_admin) > 0) {
					return view('dashboard.dashboard');
			}
			if(count($check_login_admin) == 0) {
					return view('usuario.login.login');
					echo "Usuário não encontrado!";
			}
    }
}
