<form 

@if (isset($dados))

    action="/admin/categoria/mudancas"
@else
    action="/admin/categoria/salvar"


@endif method="post">
    @csrf
    <input type="text" name="nome" id="" placeholder="Nome" value="{{ $dados->nome ?? '' }}">
    <input type="checkbox" name="disponivel" 

    @if (isset($dados)  && $dados->disponivel==1 )

        checked

        
    @endif id="">
    <input type="submit" value="Enviar">

</form>
<a href="/admin">voltar</a>