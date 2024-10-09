<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="{{ asset('css/paginaInicial.css') }}">
</head>

<body>
    <header>
        <nav>
            <div class="dropdown">
                <button class="dropbtn">Produtos</button>
                <div class="dropdown-content">
                    @forelse ($categorias as $categoria)
                        <a href="#{{ $categoria->id }}" target="_self">{{ $categoria->nome }}</a>
                    @empty
                        <p>Não há</p>
                    @endforelse
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div id="container">
            <div id="logo">

            </div>

            <div id="botoes">
                <button id="aumentar" onclick="changeFontSize('aumentar')">A+</button>
                <button id="padrao" onclick="changeFontSize('normalizar')">A</button>
                <button id="diminuir" onclick="changeFontSize('reduzir')">A-</button>
            </div>

            @forelse ($categorias as $categoria)
                <div class="categoria" id="{{$categoria->id}}">
                    <h2 class="tituloCategoria">{{ $categoria->nome }}</h2>
                    <div class="corpoCategoria">
                      @forelse ($dados[$categoria->id] as $produto)
                        <div class="card">
                          <img src="{{asset($produto->linkImagem)}}">
                          <div>
                              <h3>{{$produto->nome}}</h3>
                              <span>R$ {{ $produto->preco }}</span>
                              <button>Ler mais</button>
                          </div>
                        </div>
                      @empty
                          
                      @endforelse
                    </div>
                </div>
            @empty
            @endforelse
    </main>


</body>
<script src="{{ asset('js/fontCode.js') }}"></script>

</html>
