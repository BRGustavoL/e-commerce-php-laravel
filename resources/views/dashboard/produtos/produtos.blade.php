<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>Amazon Client</title>
</head>
<body>
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
            <a class="badge badge-primary" data-toggle="modal" data-target="#ExemploModalCentralizado" href="">Ver Produto</a>
            @if (!$produto->prod_isDestaque)
              <a class="badge badge-primary" href="/destaca_produto/{{ $produto->prod_id }}">Adicionar Destaque</a>
            @elseif ($produto->prod_isDestaque)
              <a class="badge badge-primary" href="/remover_destaque_produto/{{ $produto->prod_id }}">Remover Destaque</a>
            @endif
            <a class="badge badge-danger" href="/deleta_produto/{{ $produto->prod_id }}">Excluir</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{-- Modal Detalhes do Produto --}}
    {{ csrf_field() }}
    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">#</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <div class="modal-body">
              Conteúdo do Produto
            </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    {{-- Fim Modal Detalhes do Produto --}}
  </div>

  <style>
    .btn-cadastrar-produto {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-top: 20px;
    }
  </style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"</script>
</body>
</html>