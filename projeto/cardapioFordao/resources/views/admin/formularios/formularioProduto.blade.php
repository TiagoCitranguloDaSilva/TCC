<form 
@if (isset($dados))
     action="/admin/produto/mudancas"
@else
    action="/admin/produto/salvar"

@endif method="post">
    @csrf
    @if (isset($dados))
        @method("put")
        <input type="hidden" name="id" value="{{$dados->id}}">
    @endif
    <input type="file" name="link" id="" disabled>
    <p>
        <input type="text" name="nome" id="" placeholder="Nome" value="{{$dados->nome ?? ''}}" >
        @error('nome')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <input type="checkbox" name="disponivel"  
    @if (isset($dados)  && $dados->disponivel==1 )
        checked
    
    @endif id="">
    <p>
        <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição" maxlength="500" >{{$dados->nome ?? ''}}</textarea>
        @error('descricao')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <p>
        <input type="text" name="preco" id="" placeholder="Preço" value="{{$dados->preco?? ''}}" >
        @error('preco')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <p>
        <select name="idCategoria" id="">
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
        @error('idCategoria')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <input type="submit" value="Enviar">
</form>
<a href="/admin">voltar</a>