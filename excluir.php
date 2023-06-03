<?php
include "config.php";

$id = $_GET["id"];

$stmt = $conexao->prepare("DELETE FROM produtos WHERE id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();

header("Location: index.php");
exit();
?>
