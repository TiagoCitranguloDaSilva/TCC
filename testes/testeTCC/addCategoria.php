<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TesteTCC</title>
</head>
<body>
    <form method="post">
        <p><label for="nomeCategoria">Nome da categoria: </label><input type="text" name="nomeCategoria" id="nomeCategoria"></p>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php


$servername = "localhost";
$database = "testeTCC";
$username = "root";
$password = "admin";


if(isset($_POST["nomeCategoria"])){
        $conn = mysqli_connect($servername, $username, $password, $database);

        $result = mysqli_query($conn, "INSERT INTO Categoria(NomeCategoria) VALUE (\"" . $_POST["nomeCategoria"] ."\")");
        if($result){
            echo "Deu certo!";
        }
    }



?>