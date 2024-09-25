<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cardápio com Pop-up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirmacao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/avisos.css') }}">
</head>

<body>
    @if (session("mensagemSucesso"))
        <div id="message">
            <p>{{session("mensagemSucesso")}}</p>
        </div>
    @endif
    <header>
        <h1>Lista de produtos</h1>
        <div id="botoesAdicionar">
            <button class="btn-novo" onclick="novaCategoria()">Nova Categoria</button>
            <button class="btn-novo" onclick="novoProduto()">Novo Produto</button>
        </div>
    </header>
    <main>
        @forelse ($categorias as $categoria)
            <div 
            @if (isset($categoria->disponivel) && $categoria->disponivel == 0)
                class="categoria indisponivel"
            @else
                class="categoria"
            @endif
            >
                <div class="nomeCategoria">
                    <h2>{{ $categoria->nome }}</h2>
                    <button class="editarCategoria" onclick="editarCategoria({{$categoria->id}})">Editar</button>
                </div>
                <div class="corpoCategoria">
                    @forelse ($produtos[$categoria->id] as $produto)
                        <div
                            @if (isset($produto->disponivel) && $produto->disponivel == 0)
                                class="produto indisponivel"
                            @else
                                class="produto"
                            @endif
                        >
                            <div id="produtoItem">
                                <div class="card">
                                    <div class="img"
                                        style="background-image: url('{{ asset($produto->linkImagem) }}')">
                                    </div>
                                    <h2>{{$produto->nome}}</h2>
                                    <p>{{$produto->descricao}}</p>
                                    <button class="btn-ver" onclick="showPopUp({{$produto->id}})">Ver mais</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                        <p class="naoProdutos">Não há produtos cadastrados</p>
                    
                    @endforelse
                </div>
            </div>
        @empty
            <h2 id="naoCategorias">Não há categorias cadastradas</h2>
        @endforelse
    </main>
    <div class="modal" id="myModal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <div class="img" id="modalImage"></div>

            <div class="nomeProduto">
                <h2 id="modalNome"></h2>
            </div>

            <div class="precoProduto">
                <p id="modalPreco"></p>
            </div>

            <div class="descricaoProduto">
                <p id="modalDesc"></p>
            </div>

            <div class="disponivelProduto">
                <label for="disponivel">Disponível:</label>
                <input type="checkbox" id="disponivel" disabled>
            </div>

            <div class="botoesProduto">
                <button class="btn-editar btn" id="btnEditar">Editar</button>
                <button class="btn-excluir btn" id="btnExcluir">Excluir</button>
            </div>
        </div>
    </div>

    <a href="/admin/logout" id="logout">Sair</a>
    <script src="{{ asset('js/scriptHome.js') }}"></script>
    <script src="{{ asset('js/mensagem.js') }}"></script>
</body>

</html>
