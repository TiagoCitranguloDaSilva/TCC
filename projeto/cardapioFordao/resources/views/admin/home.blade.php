Você logou
<a href="/admin/logout">logout</a>
<a href="/admin/categoria/novo">addCategoria</a>
<a href="/admin/produto/novo">addProduto</a>
<hr>
<h2>Categorias</h2>
@foreach ($categorias as $categoria)
    <a href="/admin/categoria/update/{{ $categoria->id }}">{{ $categoria->nome }}</a>
@endforeach

<hr>
<h2>Produtos</h2>
@foreach ($produtos as $produto)
    <a href="/admin/produto/update/{{ $produto->id }}">{{ $produto->nome }}</a>
@endforeach
