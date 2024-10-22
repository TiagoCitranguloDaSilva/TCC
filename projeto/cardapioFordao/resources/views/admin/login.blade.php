<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form id="loginForm" action="/admin/validar" method="POST" autocomplete="off">
        @csrf
      <div id="usuarioContainer">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" >
        @error('username')
         <p class="erros">{{ $message }}</p>
        
        @enderror
      </div>

      <div id="senhaContainer">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" >
        @error('password')
          <p class="erros">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" id="bt">Entrar</button>
    </form>
  </div>
</body>
</html>