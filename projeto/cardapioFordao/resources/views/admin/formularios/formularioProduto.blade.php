<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Adição de Produtos</title>
    <link rel="stylesheet" href="{{ asset('css/formularioProduto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/avisos.css') }}">
</head>

<body>
    @if (session("mensagemSucesso"))
        <div id="message">
            <p>{{session("mensagemSucesso")}}</p>
        </div>
    @endif
    <div class="card">
        <h2>Adicionar Produto</h2>
        <form
            @if (isset($dados)) action="/admin/produto/mudancas"
            @else
                action="/admin/produto/salvar" @endif
            method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @if (isset($dados))
                @method('put')
                <input type="hidden" name="id" value="{{ $dados->id }}">
            @endif
            <div id="imagemContainer">
                <label for="imageInput">Imagem:</label>
                <div id="preview"
                @if (isset($dados)) 
                    style="background-image: url('{{ asset($dados->linkImagem) }}')"
                @else
                    style="display: none" 
                @endif>
                </div>
                <input type="file" id="imageInput" name="link" @if (!isset($dados)) required @endif
                    accept="image/*">
                @error('link')
                    <p class='erro'>{{ $message }}</p>
                @enderror
            </div>

            <div id="nomeContainer">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="nome" required value="{{ $dados->nome ?? old('nome') }}" placeholder="Nome do produto">
                @error('nome')
                    <p class='erro'>{{ $message }}</p>
                @enderror
            </div>

            <div id="descricaoContainer">
                <label for="description">Descrição:</label>
                <textarea id="description" name="descricao" required placeholder="Descrição do produto">{{ $dados->descricao ?? old('descricao') }}</textarea>
                @error('descricao')
                    <p class='erro'>{{ $message }}</p>
                @enderror
            </div>

            <div id="precoContainer">
                <label for="price">Preço:</label>
                <input type="number" id="price" name="preco" step="0.01" min="0" required value="{{ $dados->preco ?? old('preco') }}" placeholder="Preço do produto">
                {{-- <input type="text" id="price" name="preco" required value="{{ $dados->preco ?? old('preco') }}" placeholder="Preço do produto"> --}}
                @error('preco')
                    <p class='erro'>{{ $message }}</p>
                @enderror
            </div>

            <div id="categoriaContainer">
                <label for="category">Categoria:</label>
                <select id="category" name="idCategoria" required>
                    @forelse ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            @if (isset($dados) && $dados->idCategoria == $categoria->id)
                                selected
                            @endif
                            >{{ $categoria->nome }}</option>
                    @empty
                        <option value="#" disabled>Não há categorias disponíveis</option>
                    @endforelse
                    @error('idCategoria')
                        <p class='erro'>{{ $message }}</p>
                    @enderror
                </select>
            </div>

            <div id="disponivelContainer">
                <label for="available">Disponível no cardápio:</label>
                <input type="checkbox" id="available" name="disponivel"
                    @if (isset($dados) && $dados->disponivel == 1) checked @endif
                    {{ old('agreement') ? 'checked' : '' }}>
            </div>

            @isset($dados)
                <div id="updated">
                    <p>Atualizado em: {{$dados->updated_at}}</p>
                </div>
            @endisset

            <div id="botoes">
                <button type="submit" id="btnSalvar">
                    @if (isset($dados))
                        Salvar
                    @else
                        Adicionar
                    @endif
                </button>
                <button type="button" id="btnVoltar" onclick="window.location.href = '/admin/home'">Voltar</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.style.backgroundImage = `url('${e.target.result}')`;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="{{asset('js/mensagem.js')}}"></script>
</body>

</html>
