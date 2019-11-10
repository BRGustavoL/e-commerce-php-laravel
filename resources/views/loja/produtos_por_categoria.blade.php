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
  <div class="container filtro-categoria-select">
    <form class="filtro-categoria" action="/criar_produto" enctype="multipart/form-data" method="POST">
      <label>Filtro por Categoria</label>
      <select name="prod_categoria" class="form-control">
        @foreach($select_categorias as $categoria)
          <option value="{{ $categoria->cate_id }}"><a href="/produtos_por_categoria/{{ $categoria->cate_id }}">{{ $categoria->cate_nome }}</a></option>
          {{-- <option value="{{ $categoria->cate_id }}">{{ $categoria->cate_nome }}</option>   --}}
        @endforeach
      </select>
    </form>
    <div class="container commerce-content">
      <hr>
      {{-- <div class="commerce-products">
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
              <a href="" class="btn btn-warning">+ Carrinho</a>
            </div>
          </div>
        @endforeach
      </div> --}}
      
    </div>
  </div>

  <style>
    .filtro-categoria-select {
      padding-top: 20px;
      padding-bottom: 20px;
    }
    .btn-produtos {
      margin-right: 10px;
    }
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
