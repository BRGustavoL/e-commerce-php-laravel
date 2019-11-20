@include('templates.header.header')
  <div class="minha-conta-nav">
    @include('templates.navbar_client.navbar_client')
  </div>
  <div class="container minha-conta-content">
    @foreach ($dados_editar as $dado)
      <div class="card">
        <div class="card-header">
          <strong>Minha Conta</strong>
        </div>
        <div class="card-body">
          <form action="/salvar_minha_conta" method="POST">  
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
              <input type="hidden" class="form-control" name="usu_id" value="{{ $dado->usu_id }}">
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
            <div class="form-group">
              <label>Cartão</label>
              <input type="number" class="form-control" name="usu_cartao" value="{{ $dado->usu_cartao }}">
            </div>
            <div class="btn-editar">
              <a class="cancel-buttton btn btn-secondary" href="/minha_conta">Cancelar</a>
              <button type="submit" class="btn btn-warning">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    @endforeach
  </div>
@include('templates.footer.footer')

<style>
body {
  background-color: whitesmoke;
}
.cancel-buttton {
  margin-right: 10px;
}
.card {
  margin-top: 60px;
  margin-bottom: 60px;
}
.btn-editar {
  display: flex;
  justify-content: flex-end;
}
</style>