const accordions = document.querySelectorAll('.accordion');
accordions.forEach(accordion => {
    accordion.addEventListener('click', () => {
        const body = accordion.querySelector('.accordion-body');
        body.classList.toggle('active');
    })
})

//AUMENTAR E DIMINIR A FONTE
const aumentarBtn = document.getElementById('aumentar');
const diminuirBtn = document.getElementById('diminuir');
const padraoBtn = document.getElementById('padrao');
const corpo = document.body;

let tamanhoFonte = 16; // Tamanho da fonte padrão em pixels

aumentarBtn.addEventListener('click', () => {
  tamanhoFonte += 2;
  corpo.style.fontSize = tamanhoFonte + 'px';
});

diminuirBtn.addEventListener('click', () => {
  if (tamanhoFonte > 10) {
    tamanhoFonte -= 2;
    corpo.style.fontSize = tamanhoFonte + 'px';
  }
});

padraoBtn.addEventListener('click', () => {
  tamanhoFonte = 16;
  corpo.style.fontSize = tamanhoFonte + 'px';
});