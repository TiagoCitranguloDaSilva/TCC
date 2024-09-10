@error('existemProdutos')
    <p>{{$message}}</p>
@enderror
<form 

    @if (isset($dados))

        action="/admin/categoria/mudancas"
    @else
        action="/admin/categoria/salvar"


    @endif method="post">
    @csrf
    @if (isset($dados))
        @method("put")
        <input type="hidden" name="id" id="id" value="{{$dados->id}}">
    @endif
    <p>
        <input type="text" name="nome" id="" placeholder="Nome" value="{{ $dados->nome ?? '' }}">
        @error('nome')
            <p>{{$message}}</p>
        @enderror
    </p>
    <input type="checkbox" name="disponivel" 

    @if (isset($dados)  && $dados->disponivel==1 )

        checked

        
    @endif id="">

    @if (isset($dados))
        <button type="button" onclick="excluir({{$dados->id}})">Excluir</button>
    @endif
    <input type="submit" value="Enviar">

</form>

<script>
    function excluir(id){
        window.location.href = `/admin/categoria/excluir/${id}`
    }
</script>
<a href="/admin">voltar</a>