<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="usu_cadastro.css">
    <title>Cadastro de Usuário</title>
  </head>
  <body>
    <div class="usu-cadastro-content">
      <div class="card">
        <div class="card-header">
          <img class="card-header-logo" src="https://logodownload.org/wp-content/uploads/2014/04/amazon-logo.png">
        </div>
        <form class="input-forms" action="/insert_usuario" method="post">
          {{ csrf_field() }}
          <div class="main-title-top">
            <label>Registrar</label>
          </div>
          <div class="input-usuario">
            <label>Usuário</label>
            <input type="text" class="form-control" name="usu_login" placeholder="Digite um usuário">
          </div>
          <div class="input-usuario">
            <label>E-mail</label>
            <input type="email" class="form-control" name="usu_email" placeholder="Digite um e-mail válido">
          </div>
          <div class="input-senha">
            <label>Senha</label>
            <input type="password" class="form-control" name="usu_senha" placeholder="Digite uma senha">
          </div>
          <div class="btn-action">
            <button class="btn btn-outline-warning" type="submit">Entrar</button>
          </div>
        </form>
      </div>
    </div>
    <style>
      body {
        background-image: url('https://static.portalnovarejo.com.br/wp-content/uploads/2019/10/amazon-miniatura.png');
        width: 100%;  
        min-height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 15px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
      }
      .card-header {
        background-color: white;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .card-header-logo {
        width: 150px;
      }
      .main-title-top {
        display: flex;
        justify-content: center;
        font-size: 20px;
      }
      .usu-cadastro-content {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 70px;
      }

      .card {
        padding: 30px;
        width: 300px;
      }

      .input-usuario, .input-senha, .input-confirma-senha {
        margin-bottom: 15px;
      }

      .btn-action {
        display: flex;
        justify-content: center;
      }
      .btn-action button {
        width: 100%;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  // $login = $_POST["usu_cadastro_login"];
  // $senha = $_POST["usu_cadastro_senha"];
  // $confirma_senha = $_POST["usu_cadastro_confirma_senha"];

  // if ((!$login == '' && !$senha == '' && !$confirma_senha == '') && ($senha == $confirma_senha)) {
  //   $senha = md5($senha);
  //   $sql = "insert into usuarios (usu_login, usu_senha) values ('{$login}', '{$senha}')";
  //   $conexao = mysqli_connect("127.0.0.1", "root", "", "unoesc");

  //   $resultado = mysqli_query($conexao, $sql);

  //   if ($resultado) {
  //     header('Location: /aula2/src/usu_login/usu_login.html');
  //   }else {
  //     echo "Erro ao inserir: " . mysqli_error($resultado);
  //   }
  // }else {
  //   header('Location: /aula2/src/usu_cadastro/usu_cadastro.html');
  // }
?>