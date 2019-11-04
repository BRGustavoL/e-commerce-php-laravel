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
        return view('dashboard.dashboard');
    }

    public function produtos() {
        $produtos = DB::table('produtos as p')
        ->select('p.prod_id','p.prod_nome', 'c.cate_nome', 'p.prod_quantidade', 'p.prod_preco', 'p.prod_vendidos', 'p.prod_isDestaque', 'p.prod_isLancamento')
        ->join('categorias as c', 'p.prod_categoria', '=', 'c.cate_id')
        ->get();
        return view('dashboard.produtos.produtos', ['produtos' => $produtos]);
    }

    public function categorias() {
        return view('dashboard.categorias.categorias');
    }

    public function loja() {
        return view('loja.loja');
    }
    
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
        $this->getProdutosLoja();
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



    public function deleta_produto($id) {
        DB::table('produtos')
        ->where('prod_id', '=', $id)->delete();
        return redirect('produtos');
    }

    public function destaca_produto($id) {
        DB::table('produtos')
        ->where('prod_id', '=', $id)->update([
            'prod_isDestaque' => 1
        ]);
        return redirect('produtos');
    }

    public function remover_destaque_produto($id) {
        DB::table('produtos')
        ->where('prod_id', '=', $id)->update([
            'prod_isDestaque' => 0
        ]);
        return redirect('produtos');
    }
}
