<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
    <div class="usu-login-content">
      <div class="card">
        <form class="input-forms" action="/valida_login_usuario" method="post">
          {{ csrf_field() }}
          <label>Login</label><br><br>
          
          <div class="input-usuario">
            <label>Usuário</label>
            <input type="text" class="form-control" name="usu_login" placeholder="Digite um usuário">
          </div>
          <div class="input-senha">
            <label>Senha</label>
            <input type="password" class="form-control" name="usu_senha" placeholder="Digite uma senha">
          </div>
          <button class="btn btn-outline-success" type="submit">Entrar</button>
          <div class="label-usu-cadastro">
            <a class="a-usu-cadastro" href="{{ url('/cadastro') }}">Não tem uma conta? Cadastre-se aqui...</a>
          </div>
        </form>
      </div>
    </div>

    <style>
      .usu-login-content {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 70px;
      }

      .card {
        padding: 30px;
        width: 300px;
      }

      .input-usuario, .input-senha {
        margin-bottom: 15px;
      }

      .label-usu-cadastro {
        margin-top: 15px;
      }

      .a-usu-cadastro {
        opacity: 0.7;
        cursor: pointer;
        font-size: 12px;
      }
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  // $login = $_POST["usu_login"];
  // $senha = $_POST["usu_senha"];
  // $senha = md5($senha);

  // if (!$login == '' && !$senha == '') {
  //   $sql = "select * from usuarios where usu_login = '{$login}' and usu_senha = '{$senha}'";
  //   $conexao = mysqli_connect("localhost", "root", "", "unoesc");

  //   $resultado = mysqli_query($conexao, $sql);

  //   while ($linha = mysqli_fetch_assoc($resultado)) {
  //     $login_BD = $linha["usu_login"]; 
  //     $senha_BD = $linha["usu_senha"];
  //   }

  //   if ($login == $login_BD && $senha == $senha_BD){
  //     session_start();
  //     $_SESSION["LOGADO"] = "OK";
  //     header('Location: /aula2/src/dashboard/dashboard.php');
  //   }
  //   else {
  //     header('Location: /aula2/src/usu_login/usu_login.html');
  //   }
  // }
  // else {
  //   header('Location: /aula2/src/usu_login/usu_login.html');
  // }
?>