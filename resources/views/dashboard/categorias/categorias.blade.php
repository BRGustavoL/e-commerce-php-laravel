@include('templates.header.header')
  <div class="dashboard-nav">
    @include('templates.navbar.navbar')
  </div>
  <div class="container dashboard-conteudo table-responsive">
    <div class="btn-cadastrar-categoria">
      <a class="btn-cadastrar btn btn-primary" href="/cadastro_categoria" role="button">+ Categoria</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        {{ csrf_field() }}
        @foreach($categorias as $categoria)
        <tr>
          <th scope="row">{{ $categoria->cate_id }}</th>
          <td>{{ $categoria->cate_nome }} </td>
          <td>
            <a class="badge badge-warning" href="/edita_categoria/{{ $categoria->cate_id }}">Editar</a>
            <a class="badge badge-danger" href="/deleta_categoria/{{ $categoria->cate_id }}">Excluir</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <style>
    .btn-cadastrar-categoria {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-top: 20px;
    }
    @media screen and (max-width: 768px) {
      .btn-cadastrar-categoria .btn {
        display: block;
      }
      .btn-cadastrar {
        width: 100%;
      }
    }
  </style>

@include('templates.footer.footer')