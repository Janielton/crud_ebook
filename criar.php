<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    $stmt = $conexao->prepare("INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)");
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":preco", $preco);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
</head>
<body>
    <h1>Criar Produto</h1>
    <form method="POST" action="criar.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br>

        <input type="submit" value="Criar">
    </form>
</body>
</html>
