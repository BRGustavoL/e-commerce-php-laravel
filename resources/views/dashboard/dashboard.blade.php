@include('templates.header.header')
  <div class="dashboard-nav">
    @include('templates.navbar.navbar')
  </div>
  <div class="container dashboard-content table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Produto</th>
          <th scope="col">Quantidade Vendida</th>
        </tr>
      </thead>
      <tbody>
        {{ csrf_field() }}
        @foreach($vendidos as $produto)
        <tr>
          <th scope="row">{{ $produto->prod_id }}</th>
          <td>{{ $produto->prod_nome }} </td>
          <td>{{ $produto->prod_vendidos }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@include('templates.footer.footer')

<style>
  .dashboard-content {
    margin-top: 70px;
  }

  @media screen and (max-width: 768px) {
    .dashboard-content {
      margin-top: 20px;
      margin-bottom: 20px;
    }
  }
</style>