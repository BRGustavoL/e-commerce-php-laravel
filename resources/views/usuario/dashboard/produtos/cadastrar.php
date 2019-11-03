<?php
  $prod_nome            = $_POST["prod_nome"];
  $prod_categoria       = $_POST["prod_categoria"];
  $prod_quantidade      = $_POST["prod_qtd"];
  $prod_preco           = $_POST["prod_preco"];
  $prod_imagem          = $_FILES["prod_img"];
  $prod_imagem_detalhes = $_FILES["prod_img"];

  if (!$prod_nome == '' && !$prod_categoria == '' && !$prod_preco == '' && !$prod_quantidade == '' && !empty($prod_imagem["name"])) {
    if((!preg_match("/^image\/(pjpeg|jpeg|png)$/", $prod_imagem["type"]))){
			echo "Tipo de imagem não suportada";
			exit;
    }
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $prod_imagem["name"], $extensao);
		$dimensoes = getimagesize($prod_imagem["tmp_name"]);
    $nome_imagem = md5(uniqid(time())) . "." . $extensao[1];
    $dir_absoluto = $_SERVER("DOCUMENT_ROOT");
    echo $dir_absoluto;
    exit;
    $caminho_loja = "imagens/" . $nome_imagem;
    $caminho_detalhes = "../../loja/detalhe_produto/imagens/" . $nome_imagem;

		$sql = "insert into produtos values (DEFAULT, '{$prod_nome}', '{$prod_categoria}', '{$prod_quantidade}', '{$prod_preco}', '{$caminho_loja}', DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
		$conexao = mysqli_connect("127.0.0.1", "root", "", "unoesc");
		$resultado = mysqli_query($conexao, $sql);

		move_uploaded_file($prod_imagem["tmp_name"], $caminho_loja);
    $img_loja = imagecreatefromjpeg($caminho_loja);

    move_uploaded_file($prod_imagem_detalhes["tmp_name"], $caminho_detalhes);
    $img_detalhes = imagecreatefromjpeg($caminho_detalhes);
    

    imagedestroy($img_loja);
    imagedestroy($img_detalhes);
    


    if ($resultado) {
      header('Location: ./produtos.php');
    }else {
      echo "Erro ao inserir: " . mysqli_error($resultado);
    }
  }else {
    header('Location: ./page_cadastrar.php');
  }
?>
