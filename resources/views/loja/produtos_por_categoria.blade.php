@include('templates.header.header')
<body>
  <div class="dashboard-nav">
    @include('templates.navbar_loja.navbar_loja')
  </div>
  <div class="container filtro-categoria-select">
    <form class="filtro-categoria" action="/criar_produto" enctype="multipart/form-data" method="POST">
      <label>Filtro por Categoria</label>
      <select id="prod_categoria" name="prod_categoria" class="form-control">
        @foreach($select_categorias as $categoria)
          <option value="{{ $categoria->cate_id }}"><a href="/produtos_por_categoria/{{ $categoria->cate_id }}">{{ $categoria->cate_nome }}</a></option>
        @endforeach
      </select>
    </form>
    <div class="container commerce-content">
      <hr>
      {{-- <div class="commerce-products">
        @foreach($produtos as $produto)
          <div class="commerce-product">
            <img src="{{ $produto->prod_imagem }}" class="card-img-top" width="300" height="500" alt="IMAGE NOT FOUND">
            <div class="card-body card-body-product">
              <a class="product-card-title">{{ $produto->prod_nome }}</a>
              <div class="product-card-price">
                <strong>R$ {{ $produto->prod_preco }}</strong>
              </div>
            </div>
            <div class="card-footer">
              <a href="/detalhe_produto/{{ $produto->prod_id }}" class="btn btn-primary btn-produtos">Ver mais</a>
              <a href="" class="btn btn-warning">+ Carrinho</a>
            </div>
          </div>
        @endforeach
      </div> --}}
    </div>
  </div>
@include('templates.footer.footer')

<style>
.filtro-categoria-select {
  margin-top: 20px;
}
</style>

<script>
  document.getElementById('prod_categoria').addEventListener('change', function () {
    console.log(event.target.value);
    // window.location = "/produtos_por_categoria/" + event.target.value
  })
</script>