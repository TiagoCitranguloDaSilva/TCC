<form action="/admin/produto/salvar" method="post">
    @csrf
    <input type="file" name="link" id="" disabled>
    <input type="text" name="nome" id="" placeholder="Nome">
    <input type="checkbox" name="disponivel" id="">
    <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição" maxlength="500"></textarea>
    <input type="text" name="preco" id="" placeholder="Preço">
    <select name="idCategoria" id="">
        @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
        @endforeach
    </select>
    <input type="submit" value="Enviar">
</form>