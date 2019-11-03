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
        <form class="input-forms" action="/insert_usuario" method="post">
          {{ csrf_field() }}
          <label>Cadastro de Usuário</label><br><br>
          
          <div class="input-usuario">
            <label>Usuário</label>
            <input type="text" class="form-control" name="usu_login" placeholder="Digite um usuário">
          </div>
          <div class="input-senha">
            <label>Senha</label>
            <input type="password" class="form-control" name="usu_senha" placeholder="Digite uma senha">
          </div>
          <div class="btn-cadastrar">
            <button class="btn btn-outline-success" type="submit">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
    <style>
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

      .btn-cadastrar {
        display: flex;
        justify-content: flex-end;
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