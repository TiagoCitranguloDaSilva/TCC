<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Adição de Categorias</title>
    <link rel="stylesheet" href="{{ asset('css/formularioCategoria.css') }}">
</head>

<body>
    <div class="card">
        <h2>Adicionar Categoria</h2>
        <form
            @if (isset($dados)) action="/admin/categoria/mudancas"
            @else
                action="/admin/categoria/salvar" @endif
            method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($dados))
                @method('put')
                <input type="hidden" name="id" value="{{ $dados->id }}">
            @endif

            <div id="nomeContainer">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="nome" required value="{{ $dados->nome ?? '' }}">
                @error('nome')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div id="disponivelContainer">
                <label>Disponível no cardápio:</label>
                <input type="checkbox" id="available" name="disponivel"
                    @if (isset($dados) && $dados->disponivel == 1) checked @endif>
            </div>

            @isset($dados)
                <div id="updated">
                    <p>Atualizado em: {{ $dados->updated_at }}</p>
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
                @if (isset($dados))
                    <button type="button" onclick="excluir({{ $dados->id }})" id="btnExcluir">Excluir</button>
                @endif
            </div>
        </form>
    </div>
</body>
<script>
    function excluir(id) {
        window.location.href = `/admin/categoria/excluir/${id}`
    }
</script>
</html>
