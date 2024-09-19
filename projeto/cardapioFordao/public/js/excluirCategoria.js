

function excluir(id) {

    fetch(`/admin/categoria/produtosCadastrados/${id}`)
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


                let confirmacao = document.createElement('div')
                confirmacao.id = "confirmacao"


                let msgConfirmacao = document.createElement('p')
                msgConfirmacao.innerText = "Tem certeza que deseja excluir esta categoria? Esta ação é irreversível"

                if(data > 0){
                    msgConfirmacao.innerText += `
                    Há ${data} produtos cadastrados nesta categoria, eles serão apagados também`
                }



                confirmacao.appendChild(msgConfirmacao)

                let btnExcluir = document.createElement('button')
                btnExcluir.id = "confirmacaoBtnExcluir"
                btnExcluir.classList.add('confirmacaoBtn')
                btnExcluir.innerText = "Excluir"
                btnExcluir.addEventListener('click', () => {
                    window.location.href = `/admin/categoria/excluir/${id}`
                })

                let btnCancelar = document.createElement('button')
                btnCancelar.id = "confirmacaoBtnExcluir"
                btnCancelar.classList.add('confirmacaoBtn')
                btnCancelar.innerText = "Cancelar"
                btnCancelar.addEventListener("click", () => {
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

        })
        .catch(error => console.error('Error:', error));



    // window.location.href = `/admin/categoria/excluir/${id}`
}