// Array de produtos
const produtos = [
    { id: 1, nome: 'Suco de Laranja', categoria: 'Sucos', disponivel: true },
    { id: 2, nome: 'Sanduíche Natural', categoria: 'Lanches', disponivel: false },
    // ... outros produtos
];

// Função para criar um elemento HTML do produto
function criarProduto(produto) {
    const divProduto = document.createElement('div');
    divProduto.classList.add('produto');

    divProduto.innerHTML = `
        <p>${produto.nome} (${produto.categoria})</p>
        <label>
            <input type="checkbox" ${produto.disponivel ? 'checked' : ''}> Disponível
        </label>
        <button class="editar">Editar</button>
        <button class="excluir">Excluir</button>
    `;

    return divProduto;
}

// Função para adicionar os produtos à página
function renderizarProdutos() {
    const produtosDiv = document.getElementById('produtos');
    produtosDiv.innerHTML = '';

    produtos.forEach(produto => {
        produtosDiv.appendChild(criarProduto(produto));
    });
}

// Chamar a função para renderizar os produtos inicialmente
renderizarProdutos();
