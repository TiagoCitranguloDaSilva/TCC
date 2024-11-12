

const container = document.getElementById('cardContainer');


function createCard(name, role, photo, phone, linkedin) {

  const card = document.createElement('div');

  card.classList.add('card');

  const cardImage = document.createElement('div');

  cardImage.classList.add('card-image');

  cardImage.style.backgroundImage = `url(${photo})`;

  const cardContent = document.createElement('div');

  cardContent.classList.add('card-content');
  
  cardContent.innerHTML = `
    <h2>${name}</h2>
    <p>${role}</p>
    <p>Telefone: ${phone}</p>
    <a href="${linkedin}" target="_blank">LinkedIn</a>
  `;

  card.appendChild(cardImage);
  card.appendChild(cardContent);
  container.appendChild(card);
}

// Exemplo de como criar cards
