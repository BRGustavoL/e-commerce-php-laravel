@include('templates.header.header')
<div class="dashboard-nav">
  @include('templates.navbar.navbar')
</div>
<br>
<div class="container cate-cadastro-conteudo">
  <form action="/salva_edicao_categoria" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div class="cate-cadastro-inputs">
      <div class="form-group">
        @foreach ($categoria as $item)
          <input type="hidden" class="form-control" name="cate_id_edit" value="{{ $item->cate_id }}">
          <label class="label-cate-nome">Nome da Categoria:</label>
          <input type="text" class="form-control" name="cate_nome_edit" value="{{ $item->cate_nome }}">
          <small class="form-text text-muted">Nome completo da Categoria.</small>
        @endforeach
      </div>
    </div>
    <hr>
    <div class="cate-cadastro-btn-cadastrar">
      <a class="cancel-buttton btn btn-secondary" href="/categorias">Cancelar</a>
      <button class="btn submit-button btn-primary" type="submit">Salvar</button>
    </div>
  </form>
</div>
<style>
  .cancel-buttton {
    margin-right: 10px;
  }
  .label-cate-nome {
    margin-top: 15px;
  }
  .option-display-none {
    visibility:hidden;
  }
  .cate-cadastro-btn-cadastrar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
  }

  @media screen and (max-width: 768px) {
    .cate-cadastro-btn-cadastrar .btn {
      display: block;
    }
    .submit-button, .cancel-buttton {
      width: 100%;
    }
  }
</style>

@include('templates.footer.footer')