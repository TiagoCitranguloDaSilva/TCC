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
            <div class="logo">

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
<footer class="rodape" id="contato">
    <div class="rodape-div">

        <div class="rodape-div-1">
            <div class="rodape-div-1-coluna">
                <!-- elemento para a logo e localização -->
                <div class="logo"></div>
                <p>Monte Alegre do Sul
            </div>
            <div>
                <!-- elemento para a logo e localização -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.4771064069755!2d-46.69093702545625!3d-22.710501430884076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c925544e7263e1%3A0x78e18ca607aac15f!2sPesqueiro%20e%20Restaurante%20do%20Ford%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1730124462202!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    

        <div class="rodape-div-2">
            <div class="rodape-div-2-coluna">
                <!-- elemento para contatos -->
                <span><b>Contatos</b></span>
                <p>contato@na.na</p>
                <p>+55 63 99200-0000</p>
            </div>
        </div>

        <div class="rodape-div-3">
            <div class="rodape-div-3-coluna">
                <!-- elemento -->
                <span><b>Links</b></span>
                <p><a href="#cardapio">Cardápio</a></p>
                <p><a href="#sobre">Sobre</a></p>
                <p><a href="#quemsomos">Quem somos nós</a></p>
            </div>
        </div>

        <div class="rodape-div-4">
            <div class="rodape-div-4-coluna">
                <!-- elemento !!! pesquisar isso -->
                <span><b>Outros</b></span>
                <p>Políticas de Privacidade</p>
            </div>
        </div>

    </div>
    <p class="rodape-direitos">Copyright © 2024 – Todos os Direitos Reservados.</p>
</footer>
<script src="{{ asset('js/fontCode.js') }}"></script>
<script src="{{ asset('js/popUp.js') }}"></script>

</html>
