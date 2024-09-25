<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Adição de Categorias</title>
    <link rel="stylesheet" href="{{ asset('css/formularioCategoria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirmacao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/avisos.css') }}">
</head>

<body>
    @if (session("mensagemSucesso"))
        <div id="message">
            <p>{{session("mensagemSucesso")}}</p>
        </div>
    @endif
    <div class="card">
        <h2>Adicionar Categoria</h2>
        <form
            @if (isset($dados)) action="/admin/categoria/mudancas"
            @else
                action="/admin/categoria/salvar" @endif
            method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @if (isset($dados))
                @method('put')
                <input type="hidden" name="id" value="{{ $dados->id }}">
            @endif

            <div id="nomeContainer">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="nome" required value="{{ $dados->nome ?? old('nome') }}" placeholder="Nome da categoria">
                @error('nome')
                    <p class="erro">{{ $message }}</p>
                @enderror
            </div>

            <div id="disponivelContainer">
                <label for="available">Disponível no cardápio:</label>
                <input type="checkbox" id="available" name="disponivel"
                    @if (isset($dados) && $dados->disponivel == 1) checked @endif
                    {{ old('disponivel') ? 'checked' : '' }}>
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
    <script src="{{asset('js/excluirCategoria.js')}}"></script>
    <script src="{{asset('js/mensagem.js')}}"></script>
</html>
