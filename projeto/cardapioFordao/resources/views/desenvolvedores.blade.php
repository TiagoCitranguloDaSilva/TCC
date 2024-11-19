<!DOCTYPE html>
<html>

<head>
  <title>Quem somos nós?</title>
  <link rel="stylesheet" href="{{ asset('css/desenvolvedores.css') }}">
</head>

<body>
  <header>
    <h1>Desenvolvedores</h1>
    <button id="voltar" onclick="window.location.href='../'">Voltar</button>
  </header>
  <main>
    <div id="conteudo">
      <p>O presente Trabalho de Conclusão de Curso (TCC) foi elaborado no âmbito do curso técnico em Informática para
        Internet, oferecido pela Escola Técnica Estadual (ETEC) João Belarmino, em parceria com o Centro Paula Souza, e
        desenvolvido nas dependências da Escola Estadual Professor Clodoveu Barbosa. Sob a orientação do professor
        Rubens Castaldelli, a equipe, composta por João, Miguel, Tiago, Geovana e Rebeca, dedicou-se ao elaborar o
        projeto. As responsabilidades foram distribuídas da seguinte forma: João, Miguel e Tiago atuaram no
        desenvolvimento backend, responsáveis pela construção da lógica e infraestrutura do sistema; Geovana ficou
        responsável pelo desenvolvimento frontend, e concebeu a interface gráfica do usuário, enquanto Rebeca, se
        encarregou da documentação do projeto, se responsabilizando pelo registro de todo o processo dessa produção,
        desde a concepção inicial até a implementação final.</p>
    </div>
    <div id="cardContainer"></div>
  </main>
  <script src="{{ asset('js/cardDesenvolvedores.js') }}"></script>
  <script>
    createCard('Geovana Noronha Rodrigues', 'Desenvolvedora Front-end', "{{ asset('pictures/GeovanaFoto.jpeg') }}",
      'http://www.linkedin.com/in/geovana-rodrigues-4a6539319');
    createCard('João Felipe Lopes dos Santos', 'Desenvolvedor Back-end', "{{ asset('pictures/JoaoFoto.jpeg') }}",
      'https://www.linkedin.com/in/jo%C3%A3o-santos-376013339?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app');
    createCard('Miguel Granato Padilha', 'Desenvolvedor Back-end', "{{ asset('pictures/MiguelFoto.jpeg') }}",
      'https://www.linkedin.com/in/miguel-thipadilha-72a7a1339');
    createCard('Rebeca Civera Marchi', 'Documentação', "{{ asset('pictures/RebecaFoto.jpeg') }}",
      'https://www.linkedin.com/in/rebeca-civera-marchi-0935bb339?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app');
    createCard('Tiago Citrangulo da Silva', 'Desenvolvedor Full-stack', "{{ asset('pictures/TiagoFoto.jpeg') }}",
      'https://www.linkedin.com/in/TiagoCitranguloDaSilva/');
  </script>
</body>

</html>
