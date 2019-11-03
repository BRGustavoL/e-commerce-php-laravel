<?php
	require_once("../../components/conexao/conexao.php");
    $prod_nome        = $_POST["prod_nome"];
    $prod_categoria   = $_POST["prod_categoria"];
    $prod_quantidade  = $_POST["prod_qtd"];
    $prod_imagem      = $_FILES["prod_img"];
    
		$sql = "update produtos set nome = '$nome', email = '$email', senha = '$senha' where id = $codigo";
		$resultado = mysqli_query($conexao, $sql);
		mysqli_close($conexao);
		if($resultado){
			header("location:usuario.php");
		}
?>
