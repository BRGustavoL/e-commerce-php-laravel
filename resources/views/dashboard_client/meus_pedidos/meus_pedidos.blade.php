@include('templates.header.header')
  <div class="dashboard-nav">
    @include('templates.navbar_client.navbar_client')
  </div>
  <div class="container meus-pedidos-content">
    <div class="card">
      <div class="card-header"><strong>Meus Pedidos</strong></div>
      <div class="card-body table-responsive">
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
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($meus_pedidos as $meu_pedido)
              <tr>
                <th scope="row">{{ $meu_pedido->ped_id }}</th>
                <td>{{ $meu_pedido->ped_produto }}</td>
                <td>{{ $meu_pedido->ped_quantidade }}</td>
                <td>{{ $meu_pedido->ped_unitario }}</td>
                <td>{{ $meu_pedido->ped_total }}</td>
                <td>{{ $meu_pedido->ped_cep }}</td>
                <td>{{ $meu_pedido->ped_status }}</td>
                <td><a href="/exclui_pedido/{{ $meu_pedido->ped_id }}" class="badge badge-danger">Cancelar</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@include('templates.footer.footer')

<style>
.meus-pedidos-content {
  margin-top: 60px;
}

@media screen and (max-width: 768px) {
  .meus-pedidos-content {
    margin-top: 20px;
    margin-bottom: 20px;
  }
}
</style>