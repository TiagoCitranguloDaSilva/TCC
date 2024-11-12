<!DOCTYPE html>
<html>

<head>
    <title>Quem somos nós?</title>
    <link rel="stylesheet" href="{{ asset('css/desenvolvedores.css') }}">
</head>

<body>
    <header>
        <h1>Desenvolvedores</h1>
    </header>
    <main>
        <div id="conteudo">
            <p>O presente Trabalho de Conclusão de Curso (TCC) foi elaborado no âmbito do curso técnico em Informática para Internet, oferecido pela Escola Técnica Estadual (ETEC) João Belarmino, em parceria com o Centro Paula Souza, e desenvolvido nas dependências da Escola Estadual Professor Clodoveu Barbosa. Sob a orientação do professor Rubens Castaldelli, a equipe, composta por João, Miguel, Tiago, Geovana e Rebeca, dedicou-se ao elaborar o projeto. As responsabilidades foram distribuídas da seguinte forma: João, Miguel e Tiago atuaram no desenvolvimento backend, responsáveis pela construção da lógica e infraestrutura do sistema; Geovana ficou responsável pelo desenvolvimento frontend, e concebeu a interface gráfica do usuário, enquanto Rebeca, se encarregou da documentação do projeto, se responsabilizando pelo registro de todo o processo dessa produção, desde a concepção inicial até a implementação final.</p>
        </div>
        <div id="cardContainer"></div>
    </main>
    <script src="{{ asset('js/cardDesenvolvedores.js') }}"></script>
    <script>
        createCard('Geovana Noronha Rodrigues', 'Desenvolvedora Front-end', "{{ asset('pictures/noImage.jpg') }}", '19 99766-5087',
            'https://www.linkedin.com/in/');
        createCard('João Felipe Lopes dos Santos', 'Desenvolvedor Back-end', "{{ asset('pictures/noImage.jpg') }}", '19 99897-5197',
            'https://www.linkedin.com/in/joao-silva');
        createCard('Miguel Granato Padilha', 'Desenvolvedor Back-end', "{{ asset('pictures/noImage.jpg') }}", '19 97150-1962',
            'https://www.linkedin.com/in/');
        createCard('Rebeca Civera Marchi', 'Documentação', "{{ asset('pictures/noImage.jpg') }}", '19 99245-7692',
            'https://www.linkedin.com/in/');
        createCard('Tiago Citrangulo da Silva', 'Desenvolvedor Full-stack', "{{ asset('pictures/noImage.jpg') }}", '19 97159-5502',
            'https://www.linkedin.com/in/TiagoCitranguloDaSilva/');
    </script>
</body>

</html>
