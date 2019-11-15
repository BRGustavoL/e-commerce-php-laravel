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
use Cookie;

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
			Mail::send('email.email_user_register', ['usuario'=>$usu_login, 'senha'=>$usu_senha, 'email'=>$usu_email], function($message){
				$message->from('gustavolovera10@gmail.com', 'Gustavo - E-Commerce');
				$message->subject('Bem-vindo à Amazon E-Commerce');
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
					Cookie::queue('user', $user->usu_login, 120);
					return view('dashboard.dashboard');
				}
				if($user->usu_login == $usuario && $user->usu_senha == $senha_cript) {
					$req->session()->put('user', [md5('user')]);
					Cookie::queue('user', $user->usu_login, 120);
					return view('dashboard_client.dashboard_client');
				}
				if($user->usu_login != $usuario && $user->usu_senha != $senha_cript) {
					return view('usuario.login.login');
					echo "Usuário não encontrado!";
				}
			}
		}
		
		public function esqueci_minha_senha() {
			return view('usuario.esqueci_senha.esqueci_senha');
		}

		public function reset_senha(Request $req) {
			$senha_temporaria = '1234';
			$senha_temporaria_crypt = md5('1234');
			$esq_email = $req -> input('esq_email');
			$pesquisa_usuario = DB::table('usuarios')
			->where('usu_email', '=', $esq_email)
			->update(['usu_senha' => $senha_temporaria_crypt]);
			Mail::send('email.email_forget_password', ['senha'=>$senha_temporaria], function($message){
				$message->from('gustavolovera10@gmail.com', 'Nova senha - E-Commerce');
				$message->subject('Recuperação de senha Amazon E-Commerce');
				$message->to('gustavolovera10@gmail.com');
			});
			return view('usuario.login.login');
		}
}
