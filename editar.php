<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    $stmt = $conexao->prepare("UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id");
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
} else {
    $id = $_GET["id"];

    $stmt = $conexao->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST" action="editar.php">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $produto['nome'] ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>