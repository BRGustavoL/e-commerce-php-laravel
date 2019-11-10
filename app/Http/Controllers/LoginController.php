<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Mail;
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
			$usu_email = $req -> input('usu_email');
			$usu_senha = $req -> input('usu_senha');
			$usu_senha_cript = md5($usu_senha);
			$data = array('usu_login'=>$usu_login, 'usu_email'=>$usu_email, 'usu_senha'=>$usu_senha_cript);
			DB::table('usuarios')->insert($data);
			Mail::send('email.email_user_register', ['usuario'=>$usu_login], function($message){
				$message->from('gustavo.ecommerce.unoesc@gmail.com', 'Gustavo - E-Commerce');
				$message->to('gustavolovera10@gmail.com');
			});
			return view('usuario.login.login');
    }

    public function valida_login_usuario(Request $req) {
			$usuario = $req -> input('usu_login');
			$senha = $req -> input('usu_senha');
			$senha_cript = md5($senha);

			$user_admin = 'ADMIN';
			$pass_admin = md5('MASTER');

			$check_login = DB::table('usuarios')->where(['usu_login'=>$usuario, 'usu_senha'=>$senha_cript])->get();

			foreach($check_login as $user) {
				if($user->usu_login == $user_admin && $user->usu_senha == $pass_admin) {
					return view('dashboard.dashboard');
				}
				if($user->usu_login == $usuario && $user->usu_senha == $senha_cript) {
					return view('dashboard_client.dashboard');
				}
				if($user->usu_login != $usuario && $user->usu_senha != $senha_cript) {
					return view('usuario.login.login');
					echo "Usuário não encontrado!";
				}
			}
    }
}
