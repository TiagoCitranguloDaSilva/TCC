<form 
@if (isset($dados))
     action="/admin/produto/mudancas"
@else
    action="/admin/produto/salvar"

@endif method="post">
    @csrf
    <input type="file" name="link" id="" disabled>
    <input type="text" name="nome" id="" placeholder="Nome" value="{{$dados->nome ?? ''}}" >
    <input type="checkbox" name="disponivel"  
    @if (isset($dados)  && $dados->disponivel==1 )
        checked
    
    @endif id="">
    <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição" maxlength="500" >{{$dados->nome ?? ''}}</textarea>
    <input type="number" name="preco" id="" placeholder="Preço" value="{{$dados->preco?? ''}}" >
    <select name="idCategoria" id="">
        @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
        @endforeach
    </select>
    <input type="submit" value="Enviar">
</form>
<a href="/admin">voltar</a>