<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="https://cdn3.iconfinder.com/data/icons/cute-flat-social-media-icons-3/512/amazon.png" width="40" height="40" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <div class="toggle-icon">
        <img class="toggle-img" src="https://icon-library.net/images/3-dot-icon/3-dot-icon-0.jpg" alt="" width="45" height="45">
      </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Loja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard_cliente">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/minha_conta">Minha conta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/meus_pedidos">Meus pedidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/carrinho">Carrinho</a>
        </li>
        <li class="nav-exit nav-item">
          <a class="nav-link" href="/loggout">Sair</a>
        </li>
      </ul>
    </div>
    <a class="btn btn-warning my-2 my-sm-0" href="/loggout">Sair</a>
  </div>
</nav>

<style>
.nav-exit {
  display: none;
}
.navbar {
  background-color: rgb(52, 52, 52);
}
.nav-img {
  width: 50px;
  height: 50px;
}
.nav-link {
  color: white;
  transition: all 0.4s;
}
.nav-link:hover {
  color: #FE9900;
}

.navbar-toggler {
  color: white;
}

.toggle-icon {
  display: flex;
  flex-direction: column;
}
.btn-sair {
  color: black;
  text-decoration: none;
}

@media only screen and (max-width: 768px) {
  .btn {
    display: none;
  }
  .nav-exit {
    display: inline;
  }
}
</style>