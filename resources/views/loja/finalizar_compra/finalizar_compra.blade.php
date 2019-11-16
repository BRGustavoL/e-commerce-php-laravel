@include('templates.header.header')
  @include('templates.navbar_loja.navbar_loja')
    <div class="container carinho-content">
      <div class="card carrinho-tabela">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cód. Produto</th>
              <th scope="col">Qtd.</th>
              <th scope="col">Unit.</th>
              <th scope="col">Total</th>
              <th scope="col">CEP</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pedidos as $pedido)
            <tr>
              <th scope="row">{{ $pedido->ped_id }}</th>
              <td>{{ $pedido->ped_produto }}</td>
              <td>{{ $pedido->ped_quantidade }}</td>
              <td>{{ $pedido->ped_unitario }}</td>
              <td>{{ $pedido->ped_total }}</td>
              <td>{{ $pedido->ped_cep }}</td>
              <td>{{ $pedido->ped_status }}</td>
              {{-- <td><a class="btn btn-danger btn-remove-item" href="" role="button">Remover</a></td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="card-footer">
          <p>Total: R$ {{ $pedido->ped_total }}</p>
        </div>
      </div>
      <div class="card carrinho-pagamento">
        <div class="carrinho-pagamento-inputs">
          <div class="pagamento-titulo">
            <h5>Pagamento</h5>
            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
          </div>
          <div class="pagamento-inputs">
            <br>
            <p>Número do Cartão</p>
            <input type="text" class="form-control" placeholder="Nº do Cartão">
            <br>
            <p>Data de Validade</p>
            <input type="date" class="form-control">
            <br>
            <p>Código CV</p>
            <input type="text" class="form-control" placeholder="Código CV">
            <br>
            <p>Código de Desconto</p>
            <input type="text" class="form-control" placeholder="Código de Desconto">
            <br>
            <a class="btn btn-success btn-confirmar-pgto" href="" role="button">Confirmar Pagamento</a>
  
          </div>
        </div>
      </div>
    </div>
@include('templates.footer.footer')

<style>

.card {
  margin-right: 10px;
  padding: 30px;
}

.carinho-content {
  margin-top: 20px;
  display: flex;
}

.carrinho-tabela {
  width: 100%;
}

.carrinho-pagamento {
  width: 50%;
} 

.pagamento-titulo {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.btn-confirmar-pgto {
  width: 100%;
}

</style>