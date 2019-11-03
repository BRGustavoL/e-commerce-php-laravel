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

        $check_login = DB::table('usuarios') -> where(['usu_login'=>'admin', 'usu_senha'=>'admin']) -> get();
        if(count($check_login) > 0) {
            return view('loja/loja');
        }
        if(count($check_login) == 0) {
            return view('usuario/login/login');
            echo "Usuário não encontrado!";
        }
    }

}
