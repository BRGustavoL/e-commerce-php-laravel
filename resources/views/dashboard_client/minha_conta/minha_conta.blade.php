@include('templates.header.header')
  <div class="minha-conta-nav">
    @include('templates.navbar_client.navbar_client')
  </div>
  <div class="container minha-conta-content">
  @foreach ($dados as $dado)
    <div class="card">
      <div class="card-header">
        <strong>Minha Conta</strong>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Código</label>
          <input type="text" class="form-control" value="{{ $dado->usu_id }}" disabled>
        </div>
        <div class="form-group">
          <label>Login</label>
          <input type="text" class="form-control" value="{{ $dado->usu_login }}" disabled>
        </div>
        <div class="form-group">
          <label>E-mail</label>
          <input type="text" class="form-control" value="{{ $dado->usu_email }}" disabled>
        </div>
        <div class="form-group">
          <label>Senha</label>
          <input type="password" class="form-control" value="{{ $dado->usu_senha }}" disabled>
        </div>
        <div class="form-group">
          <label>Telefone</label>
          <input type="number" class="form-control" name="usu_telefone" value="{{ $dado->usu_telefone }}" disabled>
        </div>
        <div class="form-group">
          <label>CEP</label>
          <input type="number" class="form-control" name="usu_cep" value="{{ $dado->usu_cep }}" disabled>
        </div>
        <div class="form-group">
          <label>Complemento</label>
          <input type="text" class="form-control" name="usu_complemento" value="{{ $dado->usu_complemento }}" disabled>
        </div>
        <div class="btn-editar">
          <a class="btn btn-warning" href="/editar_minha_conta" role="button">Editar</a>
        </div>
      </div>
    </div>
  @endforeach
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