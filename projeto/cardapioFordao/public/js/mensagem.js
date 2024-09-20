document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        var mensagem = document.getElementById('message');
        if (mensagem) {
            mensagem.remove();
        }
    }, 3000);
});