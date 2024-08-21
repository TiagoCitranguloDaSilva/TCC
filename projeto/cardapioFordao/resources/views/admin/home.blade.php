Você logou
<a href="/admin/logout">logout</a>
<a href="/admin/categoria/novo">addCategoria</a>
<a href="/admin/produto/novo">addProduto</a>
<hr>
<h2>Categorias</h2>
@foreach ($categorias as $categoria)
    <p>{{ $categoria->nome }}</p>
@endforeach

<hr>
<h2>Produtos</h2>
@foreach ($produtos as $produto)
    <p>{{ $produto->nome }}</p>
@endforeach