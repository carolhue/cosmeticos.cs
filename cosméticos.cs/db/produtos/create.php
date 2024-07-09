<?php
include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, estoque) VALUES ('$nome', '$descricao', '$preco', '$estoque')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo produto criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Criar Novo Produto</h1>
    <form action="create.php" method="post">
        Nome: <input type="text" name="nome" required><br>
        Descrição: <textarea name="descricao"></textarea><br>
        Preço: <input type="number" step="0.01" name="preco" required><br>
        Estoque: <input type="number" name="estoque" required><br>
        <input type="submit" value="Criar">
    </form>
    <a href="read.php">Voltar</a>
</body>
</html>
