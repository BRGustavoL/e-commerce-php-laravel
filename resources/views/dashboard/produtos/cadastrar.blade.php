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
  @include('templates.navbar.navbar')
</div>
<br>
<div class="container prod-cadastro-conteudo">
  <form action="/criar_produto" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="prod-cadastro-inputs">
      <div class="form-group">
        <label>Nome do Produto:</label>
        <input type="text" class="form-control" name="prod_nome">
        <small class="form-text text-muted">Nome completo do produto.</small>
      </div>
      <div class="form-group">
        <label>Categoria</label>
        <select name="prod_categoria" class="form-control">
          @foreach($categorias as $categoria)
            <option value="{{ $categoria->cate_id }}">{{ $categoria->cate_nome }}</option>  
          @endforeach
        </select>
        <small class="form-text text-muted">Categoria do produto.</small>
      </div>
      <div class="form-group">
        <label>Quantidade do Produto:</label>
        <input type="number" class="form-control" name="prod_quantidade">
        <small class="form-text text-muted">Quantidade total do produto.</small>
      </div>
      <div class="form-group">
        <label>Preço do Produto:</label>
        <input id="date" type="number" class="form-control" name="prod_preco">
        <small class="form-text text-muted">Preço de venda do produto.</small>
      </div>
      <div class="form-group">
        <label>Imagem do Produto</label>
        <input type="file" class="form-control-file" name="prod_imagem">
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