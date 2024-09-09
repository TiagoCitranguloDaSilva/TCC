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
    <input type="submit" value="Enviar">

</form>
<a href="/admin">voltar</a>