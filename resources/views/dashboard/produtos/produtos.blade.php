
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
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>Amazon Client</title>
</head>
<body>
  <div class="dashboard-nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Amazon Client</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/produtos">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categorias">Categorias</a>
          </li>
        </ul>
      </div>
    </nav>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"</script>
</body>
</html>