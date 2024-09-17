{{-- Você logou
<a href="/admin/logout">logout</a>
<a href="/admin/categoria/novo">addCategoria</a>
<a href="/admin/produto/novo">addProduto</a>
<hr>
<h2>Categorias</h2>
@foreach ($categorias as $categoria)
    <a href="/admin/categoria/update/{{ $categoria->id }}">{{ $categoria->nome }}</a>
@endforeach

<hr>
<h2>Produtos</h2>
@foreach ($produtos as $produto)
    <a href="/admin/produto/update/{{ $produto->id }}">{{ $produto->nome }}</a>
@endforeach --}}
<!DOCTYPE html>
<html>

<head>
    <title>Cardápio com Pop-up</title>
    <link rel="stylesheet" href="{{ asset('css/stylepopup.css') }}">
</head>

<body>
    <header>
        <h1>Lista de produtos</h1>
        <div id="botoesAdicionar">
            <button class="btn-novo" onclick="novaCategoria()">Nova Categoria</button>
            <button class="btn-novo" onclick="novoProduto()">Novo Produto</button>
        </div>
    </header>
    <main>
        @forelse ($categorias as $categoria)
            <div class="categoria">
                <div class="nomeCategoria">
                    <h2>{{ $categoria->nome }}</h2>
                    <button class="editarCategoria" onclick="editarCategoria({{$categoria->id}})">Editar</button>
                </div>
                <div class="corpoCategoria">
                    @forelse ($produtos[$categoria->id] as $produto)
                        <div class="produto">
                            <div id="produtoItem">
                                <div class="card">
                                    <div class="img"
                                        style="background-image: url('{{ asset($produto->linkImagem) }}')">
                                    </div>
                                    {{-- <img src="{{asset('pictures/imagem_produto.jpg')}}" alt="Produto"> --}}
                                    <h2>{{$produto->nome}}</h2>
                                    <p>{{$produto->descricao}}</p>
                                    <button class="btn-ver">Ver mais</button>
                                </div>
                            </div>

                            <div class="modal" id="myModal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <div class="img"
                                        style="background-image: url('{{ asset($produto->linkImagem) }}')">
                                    </div>
                                    <div class="nomeProduto">
                                        <h2>{{$produto->nome}}</h2>
                                    </div>

                                    <div class="precoProduto">
                                        <p>{{$produto->preco}}</p>
                                    </div>

                                    <div class="descricaoProduto">
                                        <p>{{$produto->descricao}}</p>
                                    </div>
                                    <div class="disponivelProduto">
                                        <label for="disponivel">Disponível:</label>
                                        <input type="checkbox" id="disponivel" disabled
                                        @if ($produto->disponivel == 1)
                                            checked
                                        @endif
                                        >
                                    </div>
                                    <button class="btn-editar btn" onclick="editar({{$produto->id}})">Editar</button>
                                    <button class="btn-excluir btn" onclick="excluir({{$produto->id}})">Excluir</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                        <p>Não há produtos cadastrados</p>
                    
                    @endforelse
                </div>
            </div>
        @empty
            <p>Não há categorias cadastradas</p>
        @endforelse
    </main>

    <a href="/admin/logout" id="logout">Sair</a>
    <script src="{{ asset('js/scriptpopup.js') }}"></script>
</body>

</html>
