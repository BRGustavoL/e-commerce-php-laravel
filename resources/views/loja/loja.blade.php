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
    @include('templates.navbar_loja.navbar_loja')
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
      {{ csrf_field() }}
      <div class="cards-destaque">
        @foreach($produtos_loja_destaque as $produto_destaque)
          <div class="card destaque">
            <img src="{{ $produto_destaque->prod_imagem }}" class="card-img-top" width="300" height="500" alt="IMAGE NOT FOUND">
            <div class="card-body card-body-product">
              <a class="product-card-title">{{ $produto_destaque->prod_nome }}</a>
              <div class="product-card-price">
                <strong>R$ {{ $produto_destaque->prod_preco }}</strong>
              </div>
            </div>
            <div class="card-footer">
              <a href="/detalhe_produto/{{ $produto_destaque->prod_id }}" class="btn btn-primary btn-produtos">Ver mais</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="container commerce-content">
      <hr>
      <div class="commerce-products">
        @foreach($produtos as $produto)
          <div class="commerce-product">
            <img src="{{ $produto->prod_imagem }}" class="card-img-top" width="300" height="500" alt="IMAGE NOT FOUND">
            <div class="card-body card-body-product">
              <a class="product-card-title">{{ $produto->prod_nome }}</a>
              <div class="product-card-price">
                <strong>R$ {{ $produto->prod_preco }}</strong>
              </div>
            </div>
            <div class="card-footer">
              <a href="/detalhe_produto/{{ $produto->prod_id }}" class="btn btn-primary btn-produtos">Ver mais</a>
            </div>
          </div>
        @endforeach
      </div>
      
    </div>
  </div>

  <style>
    
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
    .card-footer a {
      width: 100%;
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
