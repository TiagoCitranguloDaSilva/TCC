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

            @isset($categorias)
                <div id="botoes">
                    <button id="aumentar" onclick="changeFontSize('aumentar')">A+</button>
                    <button id="padrao" onclick="changeFontSize('normalizar')">A</button>
                    <button id="diminuir" onclick="changeFontSize('reduzir')">A-</button>
                </div>
            @endisset

            @forelse ($categorias as $categoria)
                <div class="categoria" id="{{ $categoria->id }}">
                    <h2 class="tituloCategoria">{{ $categoria->nome }}</h2>
                    <div class="corpoCategoria">
                        @forelse ($dados[$categoria->id] as $produto)
                            <div class="card">
                                <img src="{{ asset($produto->linkImagem) }}">
                                <div>
                                    <h3>{{ $produto->nome }}</h3>
                                    <span>R$ {{ $produto->preco }}</span>
                                    <button class="openPopup" onclick="showPopUp('{{ asset($produto->linkImagem) }}','{{$produto->nome}}', '{{$produto->descricao}}', '{{$produto->preco}}')">Ler mais</button>



                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            @empty
                <p class="naoHa">Não há produtos disponíveis</p>
            @endforelse
            <div id="popupBlur" class="popupBlur">
                <div id="popup-content">
                    <h3>Detalhes</h3>
                    <span class="close" id="closePopup" onclick="closePopUp()">X</span>
                    <img id="productImage"></img>
                    <h4 id="productName">Nome do Produto</h4>
                    <p id="productDescription">Descrição do Produto</p>
                    <p id="productPrice">Preço: R$ 100,00</p>
                </div>
            </div>
    </main>
</body>
<script src="{{ asset('js/fontCode.js') }}"></script>
<script src="{{ asset('js/popUp.js') }}"></script>

</html>
