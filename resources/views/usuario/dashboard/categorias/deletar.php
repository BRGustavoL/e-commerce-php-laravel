<?php
	require_once("../../components/conexao/conexao.php");

	$cate_id = $_GET["codigo"];

	$sql = "delete from categorias where cate_id = $cate_id";

	$resultado = mysqli_query($conexao, $sql);

	if($resultado){
		header("location:./categorias.php");
	} else{
		echo "Erro " . mysqli_error($resultado);
	}
?>