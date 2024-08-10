const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Verificação das credenciais com o backend
  // Simulador de login válido e inválido
  if (username === 'admin' && password === 'password123') {
    // Login válido, redirecionar para outra página
    window.location.href = 'inicio/pagina_principal.html';
  } else {
    // Login inválido, redirecionar para outra página
  
    window.location.href = 'pagina_erro.html';
  }
});
