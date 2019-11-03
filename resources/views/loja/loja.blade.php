<?php
//if($_SESSION["LOGADO"] == "OK") {
?>
<?php
	// require_once("../components/conexao/conexao.php");
	// if(isset($_GET["acao"]) == 1 ){
	// 	echo "Excluido com sucesso <br><br>";
	// }

  // $sql = "select prod_id, prod_nome, prod_preco, prod_imagem from produtos where prod_isDestaque = 0";
  // $sql_destaques = "select prod_id, prod_nome, prod_preco, prod_imagem from produtos where prod_isDestaque = 1";
  // $sql_destaques_contador = "select count(*) from produtos where prod_isDestaque = 1";

  // $resultado = mysqli_query($conexao, $sql);
  // $resultado_destaques = mysqli_query($conexao, $sql_destaques);
  // $resultado_destaques_contador = mysqli_query($conexao, $sql_destaques_contador);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>Home</title>
</head>
<body>
  <div class="dashboard-nav">
    <nav class="navbar navbar-expand-lg bg-amazon">
      <div class="nav-bar-img">
        <img class="nav-bar-logo" src="http://pngimg.com/uploads/amazon/amazon_PNG11.png">
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse search-group" id="navbarNav">
        <div class="input-group">
          <input type="text" class="form-control">
          <div class="input-group-append">
            <button class="btn btn-warning btn-pesquisar" type="button" id="button-addon2">Pesquisar</button>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Mais Vendidos <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mais Desejados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Lançamentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ofertas do Dia</a>
          </li>
        </ul>
      </div>
      
      <div class="nav-bar-login-text">
        <p>Olá, seja bem-vindo</p>
        <strong><a href="/login">Entrar</a></strong>
      </div>
      <div class="nav-bar-carrinho">
        <strong class="carrinho-contador">0</strong>
        <strong class="carrinho-contador">Carrinho</strong>
      </div>
    </nav>
  </div>
  <div class="dashboard-conteudo">
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://www.lg.com/in/images/TV/features/1nov1111111lgled.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="https://www.lg.com/za/images/TV/features/LG-Nanocell-Hero-Banner_26082019-Desktop_v1.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="https://www.lg.com/uk/images/TV/features/smarttv-banner-2018-D.jpg" class="d-block w-100">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="produtos-destaque">
      <h2>Em destaque</h2>
      <small><strong>FIQUE LIGADO!</strong> Destaques novos toda semana!</small>
      <div class="cards-destaque">
      <?php //echo $resultado_destaques_contador; ?>
      <!-- <?php //if($resultado_destaques_contador <= 3) { ?> -->
        <?php //while($destaque = mysqli_fetch_assoc($resultado_destaques)) { ?>
          <div class="card destaque">
            <img src="<?php //echo $destaque['prod_imagem']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <a class="product-card-title" href=""><?php //echo $destaque['prod_nome']; ?></a>
            </div>
            <div class="card-footer">
              <?php //echo "<a class='btn btn-primary' href=./detalhe_produto/detalhe_produto.php?codigo=$destaque[prod_id]>";?> Detalhes</a>
              <!-- <a href="./detalhe_produto/detalhe_produto.php" class="btn btn-primary">Detalhes</a> -->
              <!-- <a href="product.html" class="btn btn-warning">+ Carrinho</a> -->
            </div>
          </div>
        <?php //} ?>
      <?php //} ?>
      </div>
  
    </div>
    <div class="container commerce-content">
      <hr>
      <div class="commerce-products">
      <?php //while($linha = mysqli_fetch_assoc($resultado)) { ?>
        <div class="commerce-product">
            <img src="<?php //echo $linha['prod_imagem']; ?>" class="card-img-top" alt="...">
            <div class="card-body card-body-product">
              <a class="product-card-title" href=""><?php //echo $linha['prod_nome']; ?></a>
              <div class="product-card-price">
                <strong><?php //echo "R$ " . $linha['prod_preco']; ?></strong>
              </div>
            </div>
            <div class="card-footer">
              <?php //echo "<a class='btn btn-primary' href=./detalhe_produto/detalhe_produto.php?codigo=$linha[prod_id]>";?> Detalhes</a>
              <a href="product.html" class="btn btn-warning">+ Carrinho</a>
            </div>
        </div>
        <?php //} ?>
      </div>
      
    </div>
  </div>

  <style>
    .bg-amazon {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #232F3E; 
      color: #FFF;
    }
    nav .nav-bar-logo {
      width: 150px;
      height: 70px;
      padding: 10px;
    }
    nav .nav-link {
      color: #FFF;
      transition: all 0.2s;
    }
    nav .nav-link:hover{
      color: #FF9900;
    }
    .search-dash-input {
      margin-right: 70px;
      margin-left: 30px;
    }
    .nav-bar-login-text {
      display: flex;
      align-items: flex-end;
      flex-direction: column;
      margin: 10px;
      margin-left: 25px;  
      padding: 5px;
    }
    .nav-bar-login-text p {
      margin: 0;
      font-size: 12px;
    }
    .nav-bar-login-text strong {
      transition: all 0.2s;
      cursor: pointer;
      font-size: 14px;
    }
    .nav-bar-login-text strong:hover {
      color: #FF9900;
    }
    .nav-bar-carrinho {
      margin: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.2s;
      cursor: pointer;
    }
    .nav-bar-carrinho:hover {
      color: #FF9900;
    }
    .search-group {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
    .search-group li {
      opacity: 0.8;
      font-size: 14px;
      transition: all 0.2s;
    }
    .search-group li:hover {
      opacity: 1;
    }
    .search-group .input-group {
      margin: 10px 0px 0px 5px;
    }
    .material-icons {
      color: #FFF;
    }
    .produtos-destaque {
      display: flex;
      align-items: center;
      flex-direction: column;
      padding: 45px;
    }
    .produtos-destaque small {
      margin-bottom: 40px;
    }
    .cards-destaque {
      display: flex;
      flex-direction: row;
      justify-content: center;
    }
    .cards-destaque .destaque {
      display: flex;
      flex-direction: column;
      margin: 10px;
      width: 16rem;
    }
    .card-destaque a {
      width: 100%;
    }
    .card {
      width: 16rem;
      border: none;
    }
    .card-body {
      display: flex;
      justify-content: center;
    }
    .card-footer {
      border: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .card-footer strong {
      font-size: 20px;
    }
    .card-img-top {
      width: 255px;
      height: 255px;
    }
    .commerce-products {
      display: flex;
      flex-wrap: wrap;
      max-width: 100%;
    }
    .commerce-product {
      margin: 100px 10px 10px 10px;  
    }
    .product-card-title {
      font-size: 20px;
    }
    .card-body-product {
      display: flex;
      flex-direction: column;
      align-items: center;  
    }
    .card-body-product strong {
      font-size: 20px;
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
</body>

</html>

<?php
// }else {
//   header('Location: /aula2/src/usu_login/valida_usu_login.php');
//}
?>
