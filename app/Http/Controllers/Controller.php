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

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function dashboard() {
		return view('dashboard.dashboard');
	}
	
  public function loggout() {
    $log_ip = $_SERVER['REMOTE_ADDR'];
    $log_saida = now();
    $user_cookie = Cookie::get('user');
    $in_cookie = Cookie::get('in');
    $usuario = DB::table('usuarios')
      ->select('usu_id')
      ->where('usu_login', $user_cookie)
      ->get();
    foreach ($usuario as $usu) {
      $usuario_id = $usu->usu_id;
    }
    $log_dados = array('log_usuario'=>$usuario_id, 'log_ip'=>$log_ip, 'log_entrada'=>$in_cookie, 'log_saida'=>$log_saida);
    DB::table('usuario_acesso_logs')->insert($log_dados);
    Cookie::queue(
      Cookie::forget('user'),
      Cookie::forget('in')
    );
    return redirect('');
  }
}
