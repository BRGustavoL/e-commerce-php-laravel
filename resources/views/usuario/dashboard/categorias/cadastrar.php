<?php
  $cate_nome = $_POST["cate_nome"];

  if (!$cate_nome == '') {

		$sql = "insert into categorias (cate_nome) values ('{$cate_nome}')";
		$conexao = mysqli_connect("127.0.0.1", "root", "", "unoesc");
		
		$resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      header('Location: /aula2/src/dashboard/categorias/categorias.php');
    }else {
      echo "Erro ao inserir: " . mysqli_error($resultado);
    }
  }else {
    echo "Não foi possível inserir no BD!";
  }
?>
