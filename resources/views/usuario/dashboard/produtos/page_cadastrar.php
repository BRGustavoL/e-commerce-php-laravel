<?php
	require_once("../../components/conexao/conexao.php");
	if(isset($_GET["acao"]) == 1 ){
		echo "Excluido com sucesso <br><br>";
	}

	$sql = "select * from categorias";
	$resultado = mysqli_query($conexao, $sql);
?>

<?php include("../../components/header/header.php") ?>
  <div class="dashboard-nav">
    <?php include("../../components/navbar/navbar.php") ?>
  </div>
  <br>
  <div class="container prod-cadastro-conteudo">
    <form action="./cadastrar.php" enctype="multipart/form-data" method="POST">
      <div class="prod-cadastro-inputs">
        <div class="form-group">
          <label>Nome do Produto:</label>
          <input type="text" class="form-control" name="prod_nome">
          <small class="form-text text-muted">Nome completo do produto.</small>
        </div>
        <div class="form-group">
          <label>Categoria</label>
          <select name="prod_categoria" class="form-control">
            <?php while($linha = mysqli_fetch_assoc($resultado)) { ?>
            <option value="<?php echo $linha['cate_id']; ?>"><?php echo $linha['cate_nome']; ?></option>  
            <?php } ?>
          </select>
          <small class="form-text text-muted">Categoria do produto.</small>
        </div>
        <div class="form-group">
          <label>Quantidade do Produto:</label>
          <input type="number" class="form-control" name="prod_qtd">
          <small class="form-text text-muted">Quantidade total do produto.</small>
        </div>
        <div class="form-group">
          <label>Preço do Produto:</label>
          <input id="date" type="number" class="form-control" name="prod_preco">
          <small class="form-text text-muted">Preço de venda do produto.</small>
        </div>
        <div class="form-group">
          <label>Imagem do Produto</label>
          <input type="file" class="form-control-file" name="prod_img">
          <small class="form-text text-muted">Imagem do produto.</small>
        </div>
      </div>
      <hr>
      <div class="prod-cadastro-btn-cadastrar">
        <button class="btn btn-primary" type="submit">+ Cadastrar</button>
      </div>
    </form>
  </div>
  <style>
    .option-display-none {
      visibility:hidden;
    }
    .prod-cadastro-btn-cadastrar {
      margin-bottom: 20px;
    }
  </style>
  <?php include("../../components/footer/footer.php") ?>