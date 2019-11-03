<?php
	require_once("../../components/conexao/conexao.php");

	$codigo = $_GET["codigo"];

	$sql = "delete from produtos where prod_id = $codigo";

	$resultado = mysqli_query($conexao, $sql);

	if($resultado){
		header("location:produtos.php");
	} else{
		echo "Erro " . mysqli_error($resultado);
	}
?>