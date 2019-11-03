<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard() {
        return view('dashboard/dashboard');
    }

    public function produtos() {
        return view('dashboard/produtos/produtos');
    }

    public function categorias() {
        return view('dashboard/categorias/categorias');
    }

    public function loja() {
        return view('loja/loja');
    }
    
    public function usuario_login() {
        return view('usuario/login/login');
    }

    public function usuario_cadastro() {
        return view('usuario/cadastro/cadastro');
    }

    function insert_usuario(Request $req) {
        $usu_login = $req -> input('usu_login');
        $usu_senha = $req -> input('usu_senha');
        $data = array('usu_login'=>$usu_login, 'usu_senha'=>$usu_senha);
        DB::table('usuarios')->insert($data);
        return view('usuario/login/login');
    }

    function valida_login_usuario(Request $req) {
        $usuario = $req -> input('usu_login');
        $senha = $req -> input('usu_senha');
        $admin = "admin";
        $check_login_admin = DB::table('usuarios') -> where(['usu_login'=>$admin, 'usu_senha'=>$admin]) -> get();
        if(count($check_login_admin) > 0) {
            return view('dashboard/dashboard');
        }
        if(count($check_login_admin) == 0) {
            return view('usuario/login/login');
            echo "Usuário não encontrado!";
        }
    }
}
