
const popUp= document.getElementById('popupBlur')

function showPopUp(img, nome, desc, preco){

    document.getElementById('productImage').src = img

    document.getElementById('productName').innerText = nome

    document.getElementById('productDescription').innerText = desc

    document.getElementById('productPrice').innerText = `R$ ${preco}`

    popUp.style.display = 'flex';

    document.body.classList.add('popUpActive')
    

}


function closePopUp(){

    document.body.classList.remove('popUpActive')

    popUp.style.display = "none"

}


window.onclick = function (event) {

    if (event.target === popUp) {

        closePopUp()

    }
    
}