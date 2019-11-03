<?php
	$servidor = "localhost:3306";
	$usuario = "root";
	$senha = "";
	$banco = "unoesc";
  	if(!($conexao = mysqli_connect($servidor, $usuario, $senha, $banco))){
  		echo "Erro ao conectar com BD MySQL: " . mysqli_connect_error();
  		exit;
  	}
?>