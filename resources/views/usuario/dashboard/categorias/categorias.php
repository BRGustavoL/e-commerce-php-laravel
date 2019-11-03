<?php
//if($_SESSION["LOGADO"] == "OK") {
?>

<?php
	require_once("../../components/conexao/conexao.php");
	if(isset($_GET["acao"]) == 1 ){
		echo "Excluido com sucesso <br><br>";
	}

	$sql = "select * from categorias";
	$resultado = mysqli_query($conexao, $sql);
?>

<?php include_once('../../components/header/header.php'); ?>
  <div class="dashboard-nav">
    <?php include_once('../../components/navbar/navbar.php'); ?>
  </div>
  <div class="container dashboard-conteudo">
    <div class="btn-cadastrar-categoria">
      <a class="btn-cadastrar btn btn-primary" href="./page_cadastrar.php" role="button">+ Categoria</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php while($linha = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
          <th scope="row"><?php echo $linha['cate_id']; ?></th>
          <td><?php echo $linha['cate_nome']; ?> </td>
          <td><?php echo "<a href=deletar.php?codigo=$linha[cate_id]>";?> Excluir </a>
          <?php echo "<a href=editar.php?codigo=$linha[cate_id]>";?> Editar </a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>





  <style>
    .btn-cadastrar-categoria {
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
