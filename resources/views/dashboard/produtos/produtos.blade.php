@include('templates.header.header')
  <div class="dashboard-nav">
    @include('templates.navbar.navbar')
  </div>
  <div class="container dashboard-conteudo">
    <div class="btn-cadastrar-produto">
      <a class="btn-cadastrar btn btn-primary" href="/cadastro_produto" role="button">+ Produto</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th scope="col">Preço</th>
          <th scope="col">Qtd. Estoque</th>
          <th scope="col">Qtd. Vendida</th>
          <th scope="col">Em Destaque</th>
          <th scope="col">Lançamento</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        {{ csrf_field() }}
        @foreach($produtos as $produto)
        <tr>
          <th scope="row">{{ $produto->prod_id }}</th>
          <td>{{ $produto->prod_nome }} </td>
          <td>{{ $produto->cate_nome }}</td>
          <td>{{ $produto->prod_preco }}</td>
          <td>{{ $produto->prod_quantidade }}</td>
          <td>{{ $produto->prod_vendidos }}</td>
          <td>{{ $produto->prod_isDestaque }}</td>
          <td>{{ $produto->prod_isLancamento }}</td>
          <td>
            @if (!$produto->prod_isDestaque)
            <a class="badge badge-primary" href="/destaca_produto/{{ $produto->prod_id }}">Adicionar Destaque</a>
            @elseif ($produto->prod_isDestaque)
            <a class="badge badge-primary" href="/remover_destaque_produto/{{ $produto->prod_id }}">Remover Destaque</a>
            @endif
            <a class="badge badge-warning" href="/edita_produto/{{ $produto->prod_id }}">Editar</a>
            <a class="badge badge-danger" href="/deleta_produto/{{ $produto->prod_id }}">Excluir</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <style>
    .btn-cadastrar-produto {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-top: 20px;
    }
  </style>

@include('templates.footer.footer')