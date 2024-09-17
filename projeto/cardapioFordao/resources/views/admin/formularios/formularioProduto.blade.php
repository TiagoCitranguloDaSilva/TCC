<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Adição de Produtos</title>
    <link rel="stylesheet" href="{{ asset('css/formularioProduto.css') }}">
</head>

<body>
    <div class="card">
        <h2>Adicionar Produto</h2>
        <form
            @if (isset($dados)) action="/admin/produto/mudancas"
            @else
                action="/admin/produto/salvar" @endif
            method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($dados))
                @method('put')
                <input type="hidden" name="id" value="{{ $dados->id }}">
            @endif
            <div id="imagemContainer">
                <label for="imageInput">Imagem:</label>
                <div id="preview"
                    @if (isset($dados)) style="background-image: url('{{ asset($dados->linkImagem) }}')"
                @else
                    style="display: none" @endif>
                </div>
                <input type="file" id="imageInput" name="image" @if (!isset($dados)) required @endif
                    accept="image/*">
                @error('link')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div id="nomeContainer">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="nome" required value="{{ $dados->nome ?? '' }}">
                @error('nome')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div id="descricaoContainer">
                <label for="description">Descrição:</label>
                <textarea id="description" name="descricao" required>{{ $dados->descricao ?? '' }}</textarea>
                @error('descricao')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div id="precoContainer">
                <label for="price">Preço:</label>
                <input type="number" id="price" name="preco" required value="{{ $dados->preco ?? '' }}">
                @error('preco')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div id="categoriaContainer">
                <label for="category">Categoria:</label>
                <select id="category" name="idCategoria" required>
                    @forelse ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @empty
                        <option value="#" disabled>Não há categorias disponíveis</option>
                    @endforelse
                    @error('idCategoria')
                        <p>{{ $message }}</p>
                    @enderror
                </select>
            </div>

            <div id="disponivelContainer">
                <label>Disponível no cardápio:</label>
                <input type="checkbox" id="available" name="disponivel"
                    @if (isset($dados) && $dados->disponivel == 1) checked @endif>
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
                <button type="button" id="btnVoltar" onclick="window.location.href = '/admin'">Voltar</button>
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
</body>

</html>
