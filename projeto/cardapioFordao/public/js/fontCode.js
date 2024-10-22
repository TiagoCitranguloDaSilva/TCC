var padrao

if(document.querySelector('.categoria')){
    padrao = (getComputedStyle(document.querySelector('.categoria')).getPropertyValue('font-size')).replace('px', '');
}

function changeFontSize(action) {
    // const elements = ['categorias'];
    // var padrao = getComputedStyle(document.body).getPropertyValue('font-size')
    // padrao = padrao.replace('px', '');
    var categoriasContainers = document.querySelectorAll('.categoria')
    categoriasContainers.forEach(categoria => {

        // const selector = document.getElementById(element);
        let value = getComputedStyle(categoria).getPropertyValue('font-size');

        value = value.replace('px', '');
        if(action == "aumentar" && value < (padrao * 1.20)){
            value = parseInt(value) + 4
        }else if(action == "normalizar"){
            value = padrao
        }else if(action == "reduzir" && value > (padrao * 0.8)){
            value = parseInt(value) - 4
        }
        categoria.style.fontSize = `${value}px`;
    })
    // elements.map(element => {

    //     const selector = document.getElementById(element);
    //     let value = getComputedStyle(selector).getPropertyValue('font-size');

    //     value = value.replace('px', '');
    //     if(action == "aumentar" && value < (padrao + 8)){
    //         value = parseInt(value) + 4
    //     }else if(action == "normalizar"){
    //         value = padrao
    //     }else if(action == "reduzir" && value > (padrao - 8)){
    //         value = parseInt(value) - 4
    //     }
    //     selector.style.fontSize = `${value}px`;
    // })
}