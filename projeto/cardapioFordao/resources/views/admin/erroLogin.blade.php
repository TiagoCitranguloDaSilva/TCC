<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro de Login</title>
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

h1 {
    color: #333;
}

p {
    color: #666;
}

a {
    text-decoration: none;
    color: #007bff;
}
    </style>
    <div class="container">
        <h1>Erro ao fazer login</h1>
        <p>Usuário ou senha incorretos.</p>
        <p>Verifique suas credenciais e tente novamente.</p>
        <a href="/admin/login">Voltar para o login</a>
    </div>
    <script>
        // Redirecionamento após 7 segundos:
        setTimeout(() => {
            window.location.href = "/admin/login";
        }, 7000);
        
          </script>
</body>
</html>