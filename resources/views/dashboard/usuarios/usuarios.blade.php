@include('templates.header.header')
  <div class="dashboard-nav">
    @include('templates.navbar.navbar')
  </div>
  <div class="container dashboard-conteudo">
    <div class="btn-cadastrar-usuario">
      <a class="btn-cadastrar btn btn-primary" href="/cadastro_usuario" role="button">+ Usuário</a>
    </div>
    <table class="table table-responsive">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        {{ csrf_field() }}
        @foreach($usuarios as $usuario)
        <tr>
          <th scope="row">{{ $usuario->usu_id }}</th>
          <td>{{ $usuario->usu_login }} </td>
          <td>{{ $usuario->usu_email }} </td>
          <td>
            <a class="badge badge-warning" href="/edita_usuario/{{ $usuario->usu_id }}">Editar</a>
            <a class="badge badge-danger" href="/deleta_usuario/{{ $usuario->usu_id }}">Excluir</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <style>
    .btn-cadastrar-usuario {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-top: 20px;
    }
    @media screen and (max-width: 768px) {
      .btn-cadastrar-usuario .btn {
        display: block;
      }
      .btn-cadastrar {
        width: 100%;
      }
      .btn-cadastrar-usuario {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
        margin-top: 20px;
      }
    }
  </style>
@include('templates.footer.footer')