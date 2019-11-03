<?php
	require_once("../../components/conexao/conexao.php");

	$codigo = $_GET["codigo"];
  $sql_valida_destaque = "select count(*) as contador from produtos where prod_isDestaque = 1";
  $resultado_valida_destaque = mysqli_query($conexao, $sql_valida_destaque);
  while($linha = mysqli_fetch_assoc($resultado_valida_destaque)) {
    if($linha[contador] < 3) {
      $sql = "update produtos set prod_isDestaque = 1 where prod_id = $codigo";
      $resultado = mysqli_query($conexao, $sql);
    }else {
      echo "<br><strong style='color: red;'>Não é possível definir mais que 3 produtos para destaque! Verifique!</strong><br>";
    }
  }

  if($resultado){
		header("location:produtos.php");
	} else{
		echo "Erro " . mysqli_error($resultado);
	}
?>