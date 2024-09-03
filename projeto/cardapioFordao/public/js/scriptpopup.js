const modal = document.getElementById("myModal");
const btn = document.querySelectorAll(".btn-ver");
const span = document.getElementsByClassName("close")[0];

btn.forEach(element => {
  element.addEventListener('click', () => {
    modal.style.display = "block";
  });
});

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}




function editar(id){
  window.location.href = `/admin/produto/update/${id}`
}

function excluir(id){
  window.location.href = `/admin/produto/delete/${id}`
}

function editarCategoria(id){
  window.location.href = `/admin/categoria/update/${id}`
}

function novaCategoria(){
  window.location.href = `/admin/categoria/novo/`
}
function novoProduto(id){
  window.location.href = `/admin/produto/novo`
}

