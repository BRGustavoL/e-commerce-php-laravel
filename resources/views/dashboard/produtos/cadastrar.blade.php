@include('templates.header.header')
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
      <a class="cancel-buttton btn btn-secondary" href="/produtos">Cancelar</a>
      <button class="btn btn-primary" type="submit">Cadastrar</button>
    </div>
  </form>
</div>
<style>
  .cancel-buttton {
    margin-right: 10px;
  }
  .option-display-none {
    visibility:hidden;
  }
  .prod-cadastro-btn-cadastrar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
  }
</style>

@include('templates.footer.footer')