

function changeFontSize(action) {
    const elements = ['container'];
    var padrao = 16
    console.log(window.innerWidth)
    if(window.innerWidth < 600){
        console.log("Entrou")
        padrao = 19.5
    }
    elements.map(element => {

        const selector = document.getElementById(element);
        let value = getComputedStyle(selector).getPropertyValue('font-size');

        value = value.replace('px', '');
        if(action == "aumentar" && value < (padrao + 8)){
            value = parseInt(value) + 4
        }else if(action == "normalizar"){
            value = padrao
        }else if(action == "reduzir" && value > (padrao - 8)){
            value = parseInt(value) - 4
        }
        selector.style.fontSize = `${value}px`;
    })
}