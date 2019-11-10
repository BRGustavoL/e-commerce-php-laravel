@include('templates.header.header')
  <div class="container detalhe-produto-content">
    <div class="detalhe-imagem">
      @foreach($produto_detalhado as $prod)
      <img src="{{ $prod->prod_imagem }}" class="d-block w-100" alt="...">
      {{ $prod->prod_imagem }}
    </div>
    <div class="detalhe-text">
    
      <h1>{{ $prod->prod_nome }}</h1>
      <small>Código: {{ $prod->prod_id }} / Categoria: {{ $prod->prod_categoria }}</small>

      <hr>
      <p>Lorem ipsum dolor sit, amet consectetur 
        adipisicing elit. Fugiat natus pariatur iure, 
        dolorem ipsam, quidem, eum facilis aut dignissimos 
        quasi dolores ea voluptate tempore labore excepturi 
        quibusdam sequi omnis debitis!
      </p>
      <hr>
      <div class="detalhe-text-input">
        <div class="select-cor">
          <p>Escolha uma Cor:</p>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Cor</option>
            <option value="1">Branco</option>
            <option value="2">Cinza</option>
            <option value="3">Preto</option>
          </select>
        </div>
        <div class="detalhe-text-input-quantidade">
          <div class="input-quantidade">
            <p>Quantidade:</p>
            <input type="number" class="form-control">
          </div>
        </div>
      </div>
      <hr>
      <div class="inputs-produto-frete">
        <p>Calcular Frete:</p>
        <div class="calcular-frete">
          <input type="text" class="form-control .cep-mask">
          <button type="button" class="btn btn-info btn-calcular-frete">Calcular</button>
        </div>
      </div>
      <hr>
      <div class="buttons-produto-acoes">
        <a href="" class="btn btn-warning btn-carrinho">+ Carrinho</a>
        <a href="carrinho.html" class="btn btn-success btn-comprar">Comprar</a>
      </div>
    @endforeach
    </div>
  </div>
  <div class="container">
    <hr>
  </div>

  <style>
    .detalhe-produto-content {
      display: flex;
    }
    .detalhe-imagem, .detalhe-text {
      width: 50%;
      padding: 40px 10px 10px 10px;
    }
    .detalhe-text small {
      opacity: 0.5;
    }
    .detalhe-text p {
      opacity: 0.8;
    }
    .detalhe-produto-descricao h5 {
      text-align: center;
    }
    table, th, td {
      padding: 5px;
      border: 1px solid black;
    }
    .detalhe-text-input {
      display: flex;
      justify-content: space-between;
    }
    .select-cor {
      width: 50%;
    }
    .input-quantidade {
      width: 100%;
    }
    .input-quantidade p {
      font-size: 16px;
    }
    .buttons-produto-acoes {
      display: flex;
      justify-content: space-between;
    }
    .calcular-frete {
      display: flex;
    }
    .inputs-produto-frete p {
      font-size: 16px;
    }
    .btn-carrinho, .btn-comprar {
      width: 50%;
    }
    .btn-carrinho {
      margin-right: 5px;
    }
    .btn-comprar {
      margin-left: 5px;
    }
    .btn-calcular-frete {
      margin-left: 10px;
      width: 50%;
    }
  </style>

@include('templates.footer.footer')