@include('templates.header.header')
<div class="dashboard-nav">
  @include('templates.navbar.navbar')
</div>
<br>
<div class="container prod-cadastro-conteudo">
  <form action="/salva_edicao_produto" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div class="prod-cadastro-inputs">
      <div class="form-group">
        @foreach ($produtos as $item)
          <input type="hidden" class="form-control" name="prod_id_edit" value="{{ $item->prod_id }}">

          <label class="label-prod-nome">Nome do Produto:</label>
          <input type="text" class="form-control" name="prod_nome_edit" value="{{ $item->prod_nome }}">
          <small class="form-text text-muted">Nome do Produto.</small>

          <div class="cate-nome form-group">
            <label>Categoria</label>
            <select name="prod_categoria_edit" class="form-control">
              @foreach($categorias as $categoria)
                <option value="{{ $categoria->cate_id }}">{{ $categoria->cate_nome }}</option>  
              @endforeach
            </select>
            <small class="form-text text-muted">Categoria do produto.</small>
          </div>

          <label class="label-prod-nome">Quantidade do Produto:</label>
          <input type="number" class="form-control" name="prod_qtd_edit" value="{{ $item->prod_quantidade }}">
          <small class="form-text text-muted">Quantidade do Produto.</small>

          <label class="label-prod-nome">Preço do Produto:</label>
          <input type="number" class="form-control" name="prod_preco_edit" value="{{ $item->prod_preco }}">
          <small class="form-text text-muted">Preço do Produto.</small>
        @endforeach
      </div>
    </div>
    <hr>
    <div class="prod-cadastro-btn-cadastrar">
      <a class="cancel-buttton btn btn-secondary" href="/produtos">Cancelar</a>
      <button class="btn btn-primary" type="submit">Salvar</button>
    </div>
  </form>
</div>
<style>
  .cancel-buttton {
    margin-right: 10px;
  }
  .cate-nome {
    margin-top: 15px;
  }
  .label-prod-nome {
    margin-top: 15px;
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