<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
    html, body {
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }
    th{
      text-align-last: center;
    }
    img{
     width: 20%;
     height: 20%;
   }
   .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 84px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }

  .head-logo{
    background-image: url(/images/logo.png);
    background-size: 310px;
    size: 150px;
    position: absolute;
    width: 23%;
    height: 20%;
  }
  .grid-container {
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: 300px 300px 300px 300px;
    grid-gap: 30px;
    display: grid;
    padding: 10px;
  }
  .grid-item {
    font-size: 20px;
    text-align: center;
  }
  .grid-container-img {
    grid-template-columns: 1fr ;
    grid-template-rows: 180px ;
    display: grid;
    padding: 10px;
  }
  .grid-img {
    border: 1px solid rgba(0, 0, 0, 0.8);
    align-items: center;
    border-radius: 10px;
    border-color: grey;
    margin-top: 5px;
  }
  .grid-item1 {
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.8);
    font-size: 20px;
    text-align: center;
  }

</style>
</head>

<body>   

  <nav class="navbar navbar-dark bg-dark">

    <a href="{{ route('home.index') }}" class="btn btn-secondary" role="button" aria-pressed="true">Super Mercado</a>


    @if(Auth::check())
    @if (Auth::user()->tipo == 2)
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="{{ route('UserArea.index') }}">Minha Conta</a></li>
    </ul>
    @else
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="{{ route('AdminArea.index') }}">Minha Conta</a></li>
    </ul>
    @endif
    @endif


    <ul class="navbar-nav ml-auto">

      @guest
      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="{{ route('login') }}" >{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
      @endif
      @else
      <li class="nav-item dropdown">
        <a style="color: white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Bem vindo! {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
    @endguest
  </ul>
</nav>






<nav class="navbar navbar-dark bg-dark">
  <a class="nav-link" href="{{ route('home.returnMerc') }}" style="color: white">Mercearia</a>
  <a class="nav-link" href="{{ route('home.returnHort') }}" style="color: white">Hortifruti</a>
  <a class="nav-link" href="{{ route('home.returnPad') }}" style="color: white">Padaria</a>
  <a class="nav-link" href="{{ route('home.returnBeb') }}" style="color: white">Bebidas</a>
  <a class="nav-link" href="{{ route('home.returnAcou') }}" style="color: white">Açougue</a>
  <a class="nav-link" href="{{ route('home.returnHig') }}" style="color: white">Higiene e Beleza</a>
  <a class="nav-link" href="{{ route('home.returnLim') }}" style="color: white">Limpeza</a>
  <a class="nav-link" href="{{ route('home.returnInf') }}" style="color: white">Infantil</a>
  <a class="nav-link" href="{{ route('home.returnEle') }}" style="color: white">Eletrodomésticos</a>

  <form class="form-inline" action="{{ route('home.returnPesquisa') }}">
    @csrf
    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="pesquisa">
    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">🔍  Buscar</button>
  </form>
</nav>


<div class="jumbotron" style=" background-color: grey;">
 <span style="text-align: left; font-family: serif; font-size: 40px; color: white">Aproveite as melhores ofertas do SuperMarket!</span>
 <form style="float: right;" class="form-inline" action="{{ route('carrinho.index') }}">
  @csrf
  <button  class="btn btn-lg btn-info my-2 my-sm-0" type="submit">🛒  Carrinho</button>
</form>
</div>





<div class="grid-container">
  @foreach ($produtos as $p)
  <div class="grid-item">

    <div class="grid-container-img">
      <div class="grid-img">
        <img src="{{url('/uploads/'.$p->imagem )}}" style="width: 70%; height: 100%" ; />
      </div>

      <div class=".col-6 grid-img">
        <form method="post" action="{{ route('carrinho.store') }}"> 

          <input type="number" name="id" value="{{ $p->id }}" style="display: none">
          <option value="{{ $p->nome }}">{{ $p->nome }}</option>
          <option value="{{ $p->preco }}">R$ {{ $p->preco }}</option>
          <div class="container">             
            @csrf
            <button style="margin-bottom: 2px;" class="btn btn-info my-2 my-sm-0" type="submit">Comprar</button> 
          </div>

        </form>
      </div>

    </div>

  </div>
  @endforeach
</div>



<footer class="page-footer font-small indigo bg-dark">
  <div class="container">
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a style="color: white" href="#">Sobre Nós</a>
        </h6>
      </div>
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a style="color: white" href="#">SAC</a>
        </h6>
      </div>
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a style="color: white" href="#">Contato</a>
        </h6>
      </div>
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a style="color: white" href="#">Mídias Sociais</a>
        </h6>
      </div>
    </div>
    <hr class="" style="margin: 0 15%; color: black">
    <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
      <div class="col-md-8 col-12 mt-5">
      </div>
    </div>
    <hr class="clearfix d-md-none" style="margin: 10% 15% 5%;">
    <div class="row pb-3">
      <div class="col-md-12">
        <div class="mb-5 flex-center">
        </div>
      </div>
    </div>
  </div>
</footer>





<!-- Conteúdo -- parte central //-->
@yield('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>