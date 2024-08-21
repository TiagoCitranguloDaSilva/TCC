<form action="/admin/categoria/salvar" method="post">
    @csrf
    <input type="text" name="nome" id="" placeholder="Nome">
    <input type="checkbox" name="disponivel" id="">
    <input type="submit" value="Enviar">
</form>