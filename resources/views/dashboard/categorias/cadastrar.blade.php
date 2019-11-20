@include('templates.header.header')
<div class="dashboard-nav">
  @include('templates.navbar.navbar')
</div>
<br>
<div class="container cate-cadastro-conteudo">
  <form action="/criar_categoria" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="cate-cadastro-inputs">
      <div class="form-group">
        <label>Nome da Categoria:</label>
        <input type="text" class="form-control" name="cate_nome">
        <small class="form-text text-muted">Nome completo da Categoria.</small>
      </div>
    </div>
    <hr>
    <div class="cate-cadastro-btn-cadastrar">
      <a class="cancel-buttton btn btn-secondary" href="/categorias">Cancelar</a>
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
  .cate-cadastro-btn-cadastrar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
  }
</style>

@include('templates.footer.footer')