<?php
  require_once("../../components/conexao/conexao.php");

  $prod_id = $_GET["codigo"];
  $sql = "select * from produtos where prod_id = $prod_id";
  $resultado = mysqli_query($conexao, $sql);

 while($linha = mysqli_fetch_assoc($resultado)) {
?>

<?php include("../../components/header/header.php"); ?>
<div class="dashboard-nav">
  <?php include("../../components/navbar/navbar.php"); ?>
</div>
<div class="container prod-editar-conteudo">
  <form action="./cadastrar.php" enctype="multipart/form-data" method="POST">
    <div class="prod-editar-inputs">

      <div class="form-group">
        <label>Nome do Produto:</label>
        <input type="text" class="form-control" name="prod_nome" value="<?php echo $linha['prod_nome']; ?>">
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
        <input type="number" class="form-control" name="prod_qtd" value="<?php echo $linha['prod_vendidos']; ?>">
        <small class="form-text text-muted">Quantidade total do produto.</small>
      </div>

      <div class="form-group">
        <label>Imagem do Produto</label>
        <input type="file" class="form-control-file" name="prod_img">
        <small class="form-text text-muted">Imagem do produto.</small>
      </div>
    </div>

    <hr>
    
    <div class="prod-editar-btn-cadastrar">
      <button class="btn btn-primary" type="submit">+ Cadastrar</button>
    </div>

  </form>
</div>
<?php
 } 
?>
<?php include("../../components/footer/footer.php"); ?>