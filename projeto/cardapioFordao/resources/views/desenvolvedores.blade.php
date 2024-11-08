<!DOCTYPE html>
<html>

<head>
    <title>Quem somos nós?</title>
</head>

<body>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: 300px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .card-content {
            padding: 20px;
        }
    </style>
    <div class="container">
    </div>
    <script>
        const container = document.querySelector('.container');

        // Função para criar um card
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
        createCard('João Silva', 'Desenvolvedor Front-end', 'foto-joao.jpg', '123456789',
            'https://www.linkedin.com/in/joao-silva');
        createCard('Maria Santos', 'Desenvolvedor Back-end', 'foto-maria.jpg', '987654321',
            'https://www.linkedin.com/in/maria-santos');
    </script>
</body>

</html>
