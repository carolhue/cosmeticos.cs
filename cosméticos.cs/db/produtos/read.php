<?php
include('../db/config.php');

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Lista de Produtos</h1>
    <a href="create.php">Criar Novo Produto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['descricao'] ?></td>
            <td><?= $row['preco'] ?></td>
            <td><?= $row['estoque'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $row['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>
</html>

<?php
$conn->close();
