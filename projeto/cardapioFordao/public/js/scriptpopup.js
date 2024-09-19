const modal = document.getElementById("myModal");
const btn = document.querySelectorAll(".btn-ver");
const span = document.getElementsByClassName("close")[0];

// btn.forEach(element => {
//   element.addEventListener('click', showPopUp());
// });






function editar(id){
  window.location.href = `/admin/produto/update/${id}`
}

function excluir(id){

  let confirmacao = document.createElement('div')
  confirmacao.id = "confirmacao"

  let msgConfirmacao = document.createElement('p')
  msgConfirmacao.innerText = "Tem certeza que deseja excluir este produto? Esta ação é irreversível"

  confirmacao.appendChild(msgConfirmacao)

  let btnExcluir = document.createElement('button')
  btnExcluir.id = "confirmacaoBtnExcluir"
  btnExcluir.classList.add('confirmacaoBtn')
  btnExcluir.innerText = "Excluir"
  btnExcluir.addEventListener('click', ()=>{
    window.location.href = `/admin/produto/excluir/${id}`
  })
  
  let btnCancelar = document.createElement('button')
  btnCancelar.id = "confirmacaoBtnExcluir"
  btnCancelar.classList.add('confirmacaoBtn')
  btnCancelar.innerText = "Cancelar"
  btnCancelar.addEventListener("click", ()=>{
    document.getElementById('confirmacao').remove()
    document.getElementById('blur').remove()
  })

  let containerBotoes = document.createElement('div')
  containerBotoes.id = "containerConfirmacaoBotoes"
  containerBotoes.appendChild(btnCancelar)
  containerBotoes.appendChild(btnExcluir)

  confirmacao.appendChild(containerBotoes)

  let blur = document.createElement('div')
  blur.id = "blur"

  document.body.appendChild(blur)
  document.body.appendChild(confirmacao);
  


}

function editarCategoria(id){
  window.location.href = `/admin/categoria/update/${id}`
}

function novaCategoria(){
  window.location.href = `/admin/categoria/novo/`
}

function novoProduto(){
  window.location.href = `/admin/produto/novo`
}

function showPopUp(id){
  let modalImage = document.getElementById('modalImage')
  let modalNome = document.getElementById('modalNome')
  let modalPreco = document.getElementById('modalPreco')
  let modalDesc = document.getElementById('modalDesc')
  let disponivel = document.getElementById('disponivel')
  let btnEditar = document.getElementById('btnEditar')
  let btnExcluir = document.getElementById('btnExcluir')
  

  fetch(`/admin/produto/show/${id}`)
  .then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
    }
    return response.json();
  })
  .then(data => {
      if (data.error) {
        console.log(data.error)
      } else {
          modalImage.style.backgroundImage = `url('${data.linkImagem}')`
          modalNome.innerText = data.nome
          modalPreco.innerText = data.preco
          modalDesc.innerText = data.descricao
          if(data.disponivel == 1){
            disponivel.checked = true
          }

          btnEditar.addEventListener('click', ()=>{
            editar(data.id)
          })
          btnExcluir.addEventListener('click', ()=>{
            excluir(data.id)
          })

          span.onclick = function() {
            modal.style.display = "none";
          }
          
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }

          modal.style.display = "block";

      }
  })
  .catch(error => console.error('Error:', error));



}

