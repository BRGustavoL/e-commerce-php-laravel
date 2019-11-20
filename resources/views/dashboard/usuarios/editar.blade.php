@include('templates.header.header')
<div class="dashboard-nav">
  @include('templates.navbar.navbar')
</div>
<br>
<div class="container usu-cadastro-conteudo">
  <form action="/salva_edicao_usuario" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div class="usu-cadastro-inputs">
      <div class="form-group">
        @foreach ($usuario as $item)
          <input type="hidden" class="form-control" name="usu_id_edit" value="{{ $item->usu_id }}">

          <label class="label-usu-nome">Login do Usuário:</label>
          <input type="text" class="form-control" name="usu_login_edit" value="{{ $item->usu_login }}">
          <small class="form-text text-muted">Login do Usuário.</small>

          <label class="label-usu-nome">E-mail do Usuário:</label>
          <input type="email" class="form-control" name="usu_email_edit" value="{{ $item->usu_email }}">
          <small class="form-text text-muted">E-mail completo do Usuário.</small>

          <label class="label-usu-nome">Senha do Usuário:</label>
          <input type="password" class="form-control" name="usu_senha_edit" value="{{ $item->usu_senha }}">
          <small class="form-text text-muted">Senha do Usuário.</small>
        @endforeach
      </div>
    </div>
    <hr>
    <div class="usu-cadastro-btn-cadastrar">
      <a class="cancel-buttton btn btn-secondary" href="/usuarios">Cancelar</a>
      <button class="btn btn-primary" type="submit">Salvar</button>
    </div>
  </form>
</div>
<style>
  .cancel-buttton {
    margin-right: 10px;
  }
  .label-usu-nome {
    margin-top: 15px;
  }
  .option-display-none {
    visibility:hidden;
  }
  .usu-cadastro-btn-cadastrar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
  }
</style>

@include('templates.footer.footer')