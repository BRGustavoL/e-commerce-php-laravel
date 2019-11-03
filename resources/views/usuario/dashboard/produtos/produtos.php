<?php
//if($_SESSION["LOGADO"] == "OK") {
?>

<?php
	require_once("../../components/conexao/conexao.php");
	if(isset($_GET["acao"]) == 1 ){
		echo "Excluido com sucesso <br><br>";
	}

  $sql = 
  "select 
	    p.prod_id,
      p.prod_nome,
      c.cate_nome,
      p.prod_quantidade,
      p.prod_preco,
      p.prod_vendidos,
      p.prod_isDestaque,
      p.prod_isLancamento
    from 
      produtos as p
    inner join 
      categorias as c 
    on 
      p.prod_categoria = c.cate_id";

	$resultado = mysqli_query($conexao, $sql);
?>
<?php include_once('../../components/header/header.php'); ?>
  <div class="dashboard-nav">
    <?php include_once('../../components/navbar/navbar.php'); ?>
  </div>
  <div class="container dashboard-conteudo">
    <div class="btn-cadastrar-produto">
      <a class="btn-cadastrar btn btn-primary" href="./page_cadastrar.php" role="button">+ Produto</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th scope="col">Preço</th>
          <th scope="col">Qtd. Estoque</th>
          <th scope="col">Qtd. Vendida</th>
          <th scope="col">Em Destaque</th>
          <th scope="col">Lançamento</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php while($linha = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
          <th scope="row"><?php echo $linha['prod_id']; ?></th>
          <td><?php echo $linha['prod_nome']; ?> </td>
          <td><?php echo $linha['cate_nome']; ?> </td>
          <td><?php echo $linha['prod_preco']; ?> </td>
          <td><?php echo $linha['prod_quantidade']; ?> </td>
          <td><?php echo $linha['prod_vendidos']; ?> </td>
          <td><?php echo $linha['prod_isDestaque']; ?></td>
          <td><?php echo $linha['prod_isLancamento']; ?></td>
          <td>
            <?php echo "<a class='badge badge-primary' href=destacar.php?codigo=$linha[prod_id]>";?> + DESTAQUE </a>
            <?php echo "<a class='badge badge-warning' href=page_editar.php?codigo=$linha[prod_id]>";?> Editar</a>
            <?php echo "<a class='badge badge-danger' href=deletar.php?codigo=$linha[prod_id]>";?> Excluir</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <style>
    .btn-cadastrar-produto {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-top: 20px;
    }
  </style>

<?php include_once('../../components/footer/footer.php'); ?>
  

<?php
// }else {
//   header('Location: /aula2/src/usu_login/valida_usu_login.php');
//}
?>
