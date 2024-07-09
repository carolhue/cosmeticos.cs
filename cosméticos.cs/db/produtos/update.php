<?php
include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Produto não encontrado!";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', estoque='$estoque' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado com sucesso!";
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
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Atualizar Produto</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        Nome: <input type="text" name="nome" value="<?= $row['nome'] ?>" required><br>
        Descrição: <textarea name="descricao"><?= $row['descricao'] ?></textarea><br>
        Preço: <input type="number" step="0.01" name="preco" value="<?= $row['preco'] ?>" required><br>
        Estoque: <input type="number" name="estoque" value="<?= $row['estoque'] ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="read.php">Voltar</a>
</body>
</html>

produtos/delete.php
<?php
include('../db/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produto deletado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
    header("Location: read.php");
    exit;
}
?>
                                                