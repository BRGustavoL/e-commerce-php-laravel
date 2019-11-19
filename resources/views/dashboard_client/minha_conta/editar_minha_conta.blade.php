@include('templates.header.header')
  <div class="minha-conta-nav">
    @include('templates.navbar_client.navbar_client')
  </div>
  <div class="container minha-conta-content">
    <form action="/salvar_minha_conta" enctype="multipart/form-data" method="POST">  
    {{ csrf_field() }}
    @foreach ($dados_editar as $dado)
      <div class="card">
        <div class="card-header">
          <strong>Minha Conta</strong>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Código</label>
            <input type="text" class="form-control" name="usu_id" value="{{ $dado->usu_id }}" disabled>
            <small>O código identificador não é editável!</small>
          </div>
          <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="usu_login" value="{{ $dado->usu_login }}">
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="usu_email" value="{{ $dado->usu_email }}">
          </div>
          <div class="form-group">
            <label>Senha</label>
            <input type="password" class="form-control" name="usu_senha" value="{{ $dado->usu_senha }}">
          </div>
          <div class="form-group">
            <label>Telefone</label>
            <input type="number" class="form-control" name="usu_telefone" value="{{ $dado->usu_telefone }}">
          </div>
          <div class="form-group">
            <label>CEP</label>
            <input type="number" class="form-control" name="usu_cep" value="{{ $dado->usu_cep }}">
          </div>
          <div class="form-group">
            <label>Complemento</label>
            <input type="text" class="form-control" name="usu_complemento" value="{{ $dado->usu_complemento }}">
          </div>
          <div class="btn-editar">
            <button type="submit" class="btn btn-warning">Salvar</button>
          </div>
        </div>
      </div>
    @endforeach
    </form>
  </div>
@include('templates.footer.footer')

<style>
body {
  background-color: whitesmoke;
}
.card {
  margin-top: 60px;
}
.btn-editar {
  display: flex;
  justify-content: flex-end;
}
</style>