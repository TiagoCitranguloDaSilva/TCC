<?php

    $servername = "localhost";
    $database = "testeTCC";
    $username = "root";
    $password = "admin";
    $conn = mysqli_connect($servername, $username, $password, $database);
    // $result = $conn->query("SELECT * FROM Categoria");
    $result = mysqli_query($conn, "SELECT * FROM Categoria");
    // $categorias = mysqli_fetch_assoc($result);
    // echo "<pre>";
    // print_r( $categorias );
    // echo "</pre>";



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TesteTCC</title>
</head>
<body>
    <form method="post">
        <p><label for="nome">Nome do Produto: </label><input type="text" name="nomeProduto" id="nome"></p>
        <p><label for="preco">Preço: </label><input type="number" name="precoProduto" id="preco"></p>
        <p><label for="ingredientes">Ingredientes: </label><textarea name="ingredientesProduto" id="ingredientes"></textarea></p>
        <p><label for="disponibilidade">Disponivel: </label><input type="checkbox" name="disponibilidade" id="disponibilidade"></p>
        <p>
            <label for="categoria">Categoria: </label>
            <select name="categoria" id="categoria">
                <?php

                    while( $valores = mysqli_fetch_assoc($result)){
                        echo "<option value='" . $valores["IdCategoria"] . "'>" . $valores["NomeCategoria"] . "</option>";
                    }
                ?>
                
            </select>
        </p>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>


<?php

    if(isset($_POST["nomeProduto"])){
        $nomeProduto = $_POST["nomeProduto"];
        $preco = $_POST["precoProduto"];
        $ingredientes = $_POST['ingredientesProduto'];
        $disponibilidade = $_POST['disponibilidade'];
        if($disponibilidade == "on"){
            $disponibilidade = 1;
        }else{
            $disponibilidade = 0;
        }
        $categoria = $_POST["categoria"];
        
        $final = mysqli_query($conn, "INSERT INTO Produto(CategoriaProduto, NomeProduto, PrecoProduto, IngredientesProduto, Disponibilidade) VALUE ($categoria, \"$nomeProduto\", $preco, \"$ingredientes\", $disponibilidade)");

        if($final){
            echo "DEu certo!";
        }
        
    }

?>